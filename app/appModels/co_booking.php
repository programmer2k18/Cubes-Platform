<?php

namespace App\appModels;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Traits\HandleBookingSituations;

class co_booking extends Model
{
    use HandleBookingSituations;
    protected $fillable = ['co_id','user_id','co_seating_id','from','to','capacity','status','cost'];

    public function bookingOwner(){
        return $this->belongsTo('App\appModels\User','user_id','id');
    }

    public function assetType(){
        return $this->belongsTo('App\appModels\co_seating_desks','co_seating_id','id');
    }

    public static function calculateCost($assetID,Request $request, $offer){

        $asset = \App\appModels\co_seating_desks::getAssetById($assetID);
        $times = ['Per Hour'=>1,'Per Day'=>24,'Per Week'=>7*24,'Per Month'=>30*24];
        $totalHours = $times[$asset->pricePeriodType];

        $from = Carbon::createFromTimeString($request->from);
        $to = Carbon::createFromTimeString($request->to);
        $bookedTimeInHours = $to->diffInHours($from) != 0 ??1;
        dd($bookedTimeInHours);
        return co_booking::reduceCostByOffer($offer, $asset,$bookedTimeInHours, $totalHours);
    }

    protected static function reduceCostByOffer($offer, $asset, $bookedTimeInHours, $totalHours){
        if ($offer && ($offer->seatingType === $asset->type || $offer->seatingType === "All")){
            $price = $asset->price - $asset->price*($offer->discount_rate/100);
            return round(($bookedTimeInHours*$price)/$totalHours);
        }
        return round(($bookedTimeInHours*$asset->price)/$totalHours);
    }

    public static function saveBookingRequest(Request $request,$assetId){
        $id = request()->session()->get('admin')->id;
        $offer =  co_booking::getAvailableGeneralOffers($id);
        $cost = co_booking::calculateCost($assetId,$request, $offer);

        return DB::table('co_bookings')->insertGetId([
            'co_id'=>$id,
            'user_phone'=>$request->input('phone'),
            'co_seating_id'=>$assetId,
            'from'=>$request->input('from'),
            'to'=>$request->input('to'),
            'cost'=>$cost,
            'capacity'=>$request->input('capacity'),
            'status'=>'verified'
        ]);
    }

    public static function saveBookingRequestByApi(Request $request,$co_id,$assetId){
        $cost = co_booking::calculateCost($assetId,$request);
        return DB::table('co_bookings')->insertGetId([
            'co_id'=>$co_id,
            'user_id'=>auth()->user()->id,
            'user_phone'=>auth()->user()->phone,
            'co_seating_id'=>$assetId,
            'from'=>$request->input('from'),
            'to'=>$request->input('to'),
            'cost'=>$cost,
            'capacity'=>$request->input('capacity'),
            'status'=>'verified'
        ]);
    }
    public static function checkIfAssetAvailableAtATime(Request $request ,$id,$assetId){

        $isAvailable =  co_booking::where('co_id','=',$id)->
        where('co_seating_id','=',$assetId)->
        where(function ($q) use($request){
            $q->where('status','=','verified')->orWhere('status','=','pending');
        })->where(function ($q) use($request){
            $q->where('from','<',$request->to)->where('to','>',$request->to);
        })->orWhere(function ($q) use ($request){
            $q->where('from','<',$request->from)->where('to','>',$request->from);
        })->orWhere(function ($q) use ($request){
            $q->where('from','>',$request->from)->where('to','<',$request->to);
        })->get();
        return $isAvailable;
    }

    public static function getBookingHistory($id){
         return co_booking::with('bookingOwner','assetType')->
         where('co_id','=',$id)->orderBy('created_at','DESC')->paginate(12);
    }
    public static function getBookingHistoryByUserId($user_id){

        return DB::table('co_bookings')->join
        ('co_seating_desks','co_bookings.co_seating_id',
            '=','co_seating_desks.id')->
        select(['co_bookings.*','co_seating_desks.type','co_seating_desks.price',
            'co_seating_desks.pricePeriodType', 'co_seating_desks.description'])
            ->where('co_bookings.user_id','=',$user_id)
            ->where('co_bookings.status','!=','pending')
            ->orderBy('co_bookings.created_at')->get();
    }
    public static function getProfitForMonthForCoworker($co_id,$year){

        $data =  DB::table('co_bookings')
            ->where('co_id','=',$co_id)
            ->where(function ($q){
                $q->where('status','=','closed')->orWhere('status','=','verified');
            })
            ->whereYear('from','=',$year)
            ->where('from','<=',Carbon::now())->select(['from'])
            ->select(['cost','from'])
            ->orderBy('from','ASC')->get();
        foreach ($data as $rec){
            $rec->from = Carbon::createFromTimeString($rec->from)->format('M Y');
        }
        $data = $data->groupBy('from');
        return $data;
    }

    public static function upComingRequests(){

        $id = request()->session()->get('admin')->id;
        return co_booking::with('bookingOwner','assetType')
            ->where('co_id','=',$id)->where('from','>',Carbon::now())
            ->where('to','>',Carbon::now())->where('status','=','pending')
            ->orderBy('created_at','DESC')->paginate(6);
    }

    public static function getCurrentRequests(){

        $id = request()->session()->get('admin')->id;
        return co_booking::with('bookingOwner','assetType')
            ->where('co_id','=',$id)->where('from','<',Carbon::now())
            ->where('to','>',Carbon::now())->where('status','=','verified')
            ->orderBy('created_at','DESC')->paginate(6);
    }

    public static function getCanceledRequests(){

        $id = request()->session()->get('admin')->id;
        return co_booking::with('bookingOwner','assetType')
            ->where('co_id','=',$id)
            ->where('status','=','canceled')->
            orderBy('updated_at','DESC')->paginate(6);
    }

    public static function getNumberOfBookings($id){

        return co_booking::where('co_id','=',$id)->where(function ($q){
            $q->where('status','=','closed')->orWhere('status','=','verified');
        })->count();
    }

    public static function verifyRequest($req_id){
        co_booking::where('id','=',$req_id)->where('status','=','pending')->update(['status'=>'verified']);
    }

    public static function closeRequest($id){
        co_booking::where('id','=',$id)->where('status','=','verified')
            ->update(['status'=>'closed']);
    }

    public static function cancelRequest($id){

        $request = co_booking::where('id','=',$id)->where('status','=','pending')->first();
        if($request!==null){
            $created_at = Carbon::createFromTimeString($request->created_at);
            $hours = Carbon::now()->diffInHours($created_at);
            if ($hours <= 8){
                co_booking::where('id','=',$id)->where('status','=','pending')
                    ->update(['status'=>'canceled']);
                return true;
            }else
                return false;
        }
    }

    public static function deleteRequest($id){
        co_booking::where('id','=',$id)->delete();
        \App\appModels\payment::deleteByID($id);
    }
}
