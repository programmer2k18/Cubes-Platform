<?php

namespace App\Http\Controllers\userApiControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\appModels\co_booking;

class Booking extends Controller
{

    public function __construct(){
        $this->middleware('auth:api');
        date_default_timezone_set('Africa/Cairo');
    }
    public function validateInputs(Request $request){

        $this->validate($request,[
            'from'=>'required',
            'to'=>'required',
            'capacity'=>'required|min:1|max:30'
        ]);

    }
    public function makeBookingRequest(Request $request,$co_id,$asset_id){

        if($request->from > $request->to ||$request->from < Carbon::now()){
            return response()->json(['message'=>'From date should not be 
            after end date, enter logical timing','status'=>'failed'],401);
        }
        $this->validateInputs($request);
        $notAvailable = co_booking::checkIfAssetAvailableAtATime($request,$co_id, $asset_id);

        if(count($notAvailable) > 0){
            return response()->json(['message'=>'Overlapping times, There are booking request 
            during your choosed time',
                'status'=>'failed','overlappedRequests'=>$notAvailable,'enteredRequest'=>$request],
                401);
        }else{
            $bookingID = co_booking::saveBookingRequestByApi($request,$co_id,$asset_id);
            \App\appModels\payment::makePayment($bookingID,'cash');
            return response()->json(['message'=>'Your booking verified successfully',
                'status'=>'success'],200);
        }
    }

    public function cancelBookingRequest($booking_id){

        $status =  co_booking::cancelRequest($booking_id);
        if($status){
            return response()->json(['message'=>'Your booking have been canceled, Hopping this will not happening again',
                'status'=>'success'],200);
        }else{
            return response()->json(['message'=>'Your are not allowed to cancel a request after 8 hours from booking',
                'status'=>'failed'],401);
        }
    }

    public function getBookingHistoryForUser(){

        $user_id = auth()->user()->id;
        $requests = co_booking::getBookingHistoryByUserId($user_id);
        if(count($requests) > 0)
            return response()->json(['requests'=>$requests,'status'=>'success'],200);
        return response()->json(['message'=>'No request made yet.','status'=>'failed'],401);
    }
}
