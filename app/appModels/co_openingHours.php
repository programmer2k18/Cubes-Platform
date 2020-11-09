<?php

namespace App\appModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class co_openingHours extends Model
{

    protected $fillable = ['co_id','day','from','to'];

    public static function addOpeningTime(Request $request){
        DB::table('co_opening_hours')->insert([
            'co_id'=>$request->session()->get('admin')->id,
            'day'=>$request->input('day'),
            'from'=>$request->input('from'),
            'to'=>$request->input('to'),
        ]);
    }

    public static function getLateastOpeningTimes($co_id){

        return DB::table('co_opening_hours')->where('co_id','=',$co_id)->get();
    }

    public static function getOpeningTimeByID($id){
        return DB::table('co_opening_hours')->
        where('id','=',$id)->first();
    }

    public static function editOpeningTime(Request $request, $id){

        DB::table('co_opening_hours')->where('id','=',$id)
            ->update([
                'day'=>$request->input('day'),
                'from'=>$request->input('from'),
                'to'=>$request->input('to')
            ]);
    }

    public static function deleteOpeningTime($id){
        DB::table('co_opening_hours')->where('id','=',$id)->delete();
    }
}
