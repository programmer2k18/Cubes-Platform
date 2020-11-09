<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 6/4/2020
 * Time: 10:09 PM
 */

namespace App\Traits;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

trait HandleBookingSituations
{

    public  static function getAvailableCustomizedOffers($co_id, $user_id){
       return DB::select('select o.user_id,o.seatingType, o.from, o.to, o.discount_rate 
          from offers o where o.off_co_id=? and o.user_id=? and o.from <? and o.to >?',[
              $co_id, $user_id,Carbon::now(),Carbon::now()]);

    }

    public  static function getAvailableGeneralOffers($co_id){
        $offers= DB::select('select o.user_id,o.seatingType, o.from, o.to, o.discount_rate 
          from offers o where o.off_co_id=? and o.from <? and o.to >?',[
            $co_id,Carbon::now(),Carbon::now()]);
        return $offers?$offers[0]:false;
    }

    public static function checkOffers($co_id, $user_id){

        $offers = HandleBookingSituations::getAvailableCustomizedOffers($co_id, $user_id);
        if ( $offers == null)
            $offers = HandleBookingSituations::getAvailableGeneralOffers($co_id);
        return $offers[0];
    }

}