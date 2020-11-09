<?php

namespace App\appModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class offers extends Model
{
    protected $fillable = ['off_id','off_co_id','user_id','from','to',
                           'description','seatingType','discount_rate'];

    public static function addNewOffer(Request $req, $user_id = 0){
        $co_id = \request()->session()->get('admin')->id;
        return DB::insert('insert into offers(offers.off_co_id, offers.user_id, offers.from, offers.to,
        offers.description, offers.seatingType, offers.discount_rate) values (?,?,?,?,?,?,?)', [
            $co_id, $user_id, $req->from, $req->to, 
            htmlspecialchars(trim($req->description)), $req->type, $req->discount
        ]);
    }

    public static function generalOffers($co_id){
        return DB::select('select * from offers where off_co_id = ? AND user_id=? 
                   order by created_at DESC',[$co_id,0]);
    }
    
    public static function customizedOffers($co_id){
        return DB::select('select offers.*, users.name, users.image,users.email 
             from offers inner join users on offers.user_id = users.id
              where offers.off_co_id = ? order by offers.created_at DESC',[$co_id]);
    }
    //close offer now
    public static function closeOffer($offer_id){
        return DB::table('offers')->where('off_id',$offer_id)->
        where('off_co_id',\request()->session()->get('admin')->id)->update([
            'to'=>\Carbon\Carbon::now()
        ]);
    }

    public static function getOfferById($offer_id){
        return DB::select('select * from offers where offers.off_id =?',[$offer_id]);
    }
    public static function updateOffer(Request $req , $offer_id){

        return DB::update('update offers set offers.from = ?, offers.to = ?,
        offers.description =?, offers.seatingType =?, offers.discount_rate =? where offers.off_id=? ',[
             $req->from, $req->to, htmlspecialchars(trim($req->description)),
             $req->type, $req->discount, $offer_id]);
    }

    public static function getLoyalUsersToUpgrade($co_id, $orderType){

        return DB::table('users as u')->
                   join('co_bookings as b','u.id','b.user_id')
                   ->where('b.co_id',$co_id)
                   ->where(function ($q){
                        $q->where('b.status','verified')->orWhere('b.status','closed');})
                   ->select(['u.*',DB::raw('count(b.user_id) as bookCount')])
                   ->groupBy('u.id')->orderBy('bookCount',$orderType)
                   ->paginate(15);
    }

    public static function getNeverBookedUsersToUpgrade($co_id){

        return DB::table('users as u')->
            leftJoin('co_bookings as b','u.id','=','b.user_id')
            ->whereNull('b.co_id')
            ->select(['u.*'])->paginate(15);
    }

    public static function selectNearestUsersToUpgrade(){
        $coSpace = \request()->session()->get('admin');
        return DB::table('users')
               ->where('governorate','like','%'.$coSpace->governorate.'%')
               ->orWhere('city','like','%'.$coSpace->city.'%')
               ->orWhere('street','like','%'.$coSpace->street.'%')
               ->paginate(15);
    }


}
