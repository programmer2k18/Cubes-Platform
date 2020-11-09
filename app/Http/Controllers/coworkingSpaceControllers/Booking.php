<?php

namespace App\Http\Controllers\coworkingSpaceControllers;

use App\appModels\co_booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\AuthCoworking;

class Booking extends Controller
{
    public function __construct(){
        $this->middleware('AuthCoworking');
    }

    public function getBookingForm($asset_id, $asset_type){

        return view('dashboard.booking.makeBooking')
            ->with(['assetId'=>$asset_id,'type'=>$asset_type]);
    }

    public function makeBookingRequest(Request $request,$asset_id){

        if($request->from > $request->to ||$request->from < Carbon::now())
            return redirect()->back()->with('msg','From date should not be after end date, enter logical timing');
        $this->validateInputs($request);
        $id = $request->session()->get('admin')->id;
        $notAvailable = co_booking::checkIfAssetAvailableAtATime($request,$id, $asset_id);

        if(count($notAvailable) > 0){
            return view('dashboard.booking.overlapping')
                ->with(['requests'=>$notAvailable,'enteredRequest'=>$request]);
        }else{
            $bookingID = co_booking::saveBookingRequest($request,$asset_id);
            \App\appModels\payment::makePayment($bookingID,'cash');
            return redirect(route('currentBookedRequests'));
        }
    }

    public function getBookingHistory(){

        $id = request()->session()->get('admin')->id;
        $requests = co_booking::getBookingHistory($id);
        return view('dashboard.booking.bookingHistory')->with('requests',$requests);
    }

    public function upComingRequests(){
        $requests = co_booking::upComingRequests();
        //dd($requests);
        return view('dashboard.booking.newRequests')->with('requests',$requests);
    }

    public function currentBookedRequests(){

        $requests = co_booking::getCurrentRequests();
        return view('dashboard.booking.currentRequests')->with('requests',$requests);
    }

    public function getCanceledRequests(){

        $requests = co_booking::getCanceledRequests();
        return view('dashboard.booking.canceledBookings')->with('requests',$requests);
    }

    public function verifyRequest($id){
        co_booking::verifyRequest($id);
        return redirect()->back()->with('added_msg','Booking Request Verified Successfully');
    }

    public function closeRequest($id){
        co_booking::closeRequest($id);
        return redirect()->back()->with('added_msg','Booking Request Closed Successfully');
    }
    public function deleteRequest(Request $request){

        if ($request->ajax()){
            co_booking::deleteRequest($request->id);
            return response()->json(['Massage'=>'deleted successfully']);
        }
    }

    public function validateInputs(Request $request){

        $this->validate($request,[
            'phone'=>'required|max:11|min:11',
            'from'=>'required',
            'to'=>'required',
            'capacity'=>'required|min:1|max:30'
        ]);
    }
}
