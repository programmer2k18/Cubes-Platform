<?php

namespace App\Http\Controllers\userApiControllers;

use App\ImageHandeller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoworkingSpace extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function test(){
            return response()->json(['message'=>"yesssssssssss"]);
    }
    public function getCoworkingInformation($co_id){

        $information = \App\appModels\coworkingSpace::getPlaceInformation($co_id);
        $information = ImageHandeller::convertToBase64($information);
        $openingTimes = \App\appModels\co_openingHours::getLateastOpeningTimes($co_id);
        return response()->json(['information'=>$information,'openingTimes'=>$openingTimes,
            'status'=>'success'],200);
    }

    public function getCoworkingAssets($co_id){

        $assets = \App\appModels\co_seating_desks::getPlaceAssets($co_id);
        $assets = ImageHandeller::convertToBase64($assets);
        return response()->json(['assets'=>$assets,'status'=>'success'],200);
    }

    public function getCoworkingAnnouncements($co_id){

        $announcements = \App\appModels\announcements::getLateastPostsForApi($co_id);
        $announcements = ImageHandeller::convertToBase64($announcements);
        if (count($announcements) > 0)
            return response()->json(['announcements'=>$announcements,'status'=>'success'],200);
        else{
            return response()->json(['message'=>'No announcements made yet',
                'status'=>'failed'],200);}
    }

    public function getCoworkingViews($co_id){

        $images = \App\appModels\co_images::getAllImages($co_id);
        $images = ImageHandeller::convertToBase64($images);
        if (count($images) > 0)
            return response()->json(['views'=>$images,'status'=>'success'],200);
        else{
            return response()->json(['message'=>'No views available yet.',
                'status'=>'failed'],200);}
    }

    public function getCoworkingAmenities($co_id){

        $Amenities = \App\appModels\amenities::getAmenitiesByApi($co_id);
        $Amenities = ImageHandeller::convertToBase64($Amenities);
        if (count($Amenities) > 0)
            return response()->json(['amenities'=>$Amenities,'status'=>'success'],200);
        else{
            return response()->json(['message'=>'No amenities',
                'status'=>'failed'],200);}
    }

    public function searchForCoworkingSpace($word) {

        $coworkingSpaces = \App\appModels\coworkingSpace::searchForSpace($word);
        $coworkingSpaces = ImageHandeller::convertToBase64($coworkingSpaces);
        if (count($coworkingSpaces) > 0)
            return response()->json(['places'=>$coworkingSpaces,'status'=>'success'],200);
        else{
            return response()->json(['message'=>'No matching results for '.$word,
                'status'=>'failed'],200);}
    }

}
