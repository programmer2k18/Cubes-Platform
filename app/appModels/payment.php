<?php

namespace App\appModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class payment extends Model
{

    protected $fillable =['id'];
    public static function makePayment($id,$method){

        DB::table('payments')->insert([
            'id'=>$id,
            'payment_method'=>$method
        ]);
    }

    public static function  deleteByID($id){
        payment::where('id','=',$id)->delete();
    }
}
