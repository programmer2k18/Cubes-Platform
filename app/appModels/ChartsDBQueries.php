<?php

// to handle all charts required queries
namespace App\appModels;
use Carbon\Carbon;
use function foo\func;
use Illuminate\Support\Facades\DB;


class ChartsDBQueries
{
    public static function getBookingRequestsThisYear(){
        $co_id = request()->session()->get('admin')->id;
        $data = DB::table('co_bookings')->where('co_id',$co_id)->
        where(function ($q){
            $q->where('status','=','closed')->orWhere('status','=','verified');
        })->whereYear('from','=',Carbon::now()->year)
        ->where('from','<=',Carbon::now())->select(['from'])
        ->orderBy('from','ASC')->get();
        foreach ($data as $rec){
            $rec->from = Carbon::createFromTimeString($rec->from)->format('M Y');
        }
        $data = $data->groupBy('from')->map(function ($item){
            return count($item);
        });
        return $data;

    }

    public static function getMostBookedAssets(){
        $co_id = request()->session()->get('admin')->id;

        $data = DB::table('co_bookings')->
        join('co_seating_desks','co_bookings.co_seating_id','=','co_seating_desks.id')->
        where('co_bookings.co_id',$co_id)->
        where(function ($q){
            $q->where('status','=','closed')->orWhere('status','=','verified');
        })->select(['co_seating_desks.type'])->
        get();

        $data = $data->groupBy('type')->map(function ($item){
            return count($item);
        });
        return $data;
    }

    public static function getMostBookedRegions(){
        $co_id = request()->session()->get('admin')->id;

        $data = DB::table('co_bookings')->
        join('users','co_bookings.user_id','=','users.id')->
        where('co_bookings.co_id',$co_id)->
        where('co_bookings.user_id','!=',null)->
        where(function ($q){
            $q->where('status','=','closed')->orWhere('status','=','verified');
        })->select(['users.city',DB::raw("COUNT(users.city) as count")])->
        groupBy('users.city')->
        orderByDesc('count')->distinct()->
        limit(7)->get();
        return $data;
    }

    public static function getTop10BookedUsers(){

        $co_id = request()->session()->get('admin')->id;

        $data = DB::table('co_bookings')->
        join('users','co_bookings.user_id','=','users.id')->
        where('co_bookings.co_id',$co_id)->
        where('co_bookings.user_id','!=',null)->
        where(function ($q){
            $q->where('status','=','closed')->orWhere('status','=','verified');
        })->select(['users.name',DB::raw("COUNT(co_bookings.user_id) as count")])->
        groupBy('users.name')->
        orderByDesc('count')->
        distinct()->limit(10)->get();
        return $data;
    }

    public static function getFrequentlyBookedUsersAges(){

        $co_id = request()->session()->get('admin')->id;

        $data = DB::table('co_bookings')->
        join('users','co_bookings.user_id','=','users.id')->
        where('co_bookings.co_id',$co_id)->
        where('co_bookings.user_id','!=',null)->
        where(function ($q){
            $q->where('status','=','closed')->orWhere('status','=','verified');
        })->
        select(['users.age'])->distinct()->get();
        return $data;
    }

    public static function getCanceledRequests(){

        $id = request()->session()->get('admin')->id;
        return co_booking::where('co_id','=',$id)->where('status','=','canceled')->
        get();
    }
}