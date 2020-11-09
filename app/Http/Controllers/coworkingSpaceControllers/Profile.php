<?php

namespace App\Http\Controllers\coworkingSpaceControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\AuthCoworking;

class Profile extends Controller
{
    public function __construct(){
        $this->middleware('AuthCoworking');
    }
    public function getProfile($co_id){

        //dd(\request()->session()->get('admin'));
        $placeInfo = \App\appModels\coworkingSpace::getPlaceInformation($co_id);
        $numberOfBookings = \App\appModels\co_booking::getNumberOfBookings($co_id);
        $url = route('profile',$co_id);
        return view('dashboard.profile.profile')->with([
            'place'=>$placeInfo,
            'numberOfBookings'=>$numberOfBookings,
            'url'=>$url
        ]);
    }
    public function updateProfile(Request $request, $co_id){

        $this->checkInputs($request);
        \App\appModels\coworkingSpace::updateProfile($request,$co_id);
         return redirect()->back()->with('added_msg','Profile updated Successfully.');
    }

    public function getProfit(Request $request){
        if($request->ajax()){
            $co_id = $request->session()->get('admin')->id;
            $profit = \App\appModels\co_booking::getProfitForMonthForCoworker($co_id,\Carbon\Carbon::now()->year);
            return response($profit,200);
        }
    }
    public function checkInputs(Request $request){

        $this->validate($request,[
            'name'=>'string',
            'email'=>'email|string',
            'password'=>'min:6|max:30',
            'description'=>'string',
            'governorat'=>'string',
            'city'=>'string',
            'street'=>'string'
        ]);
    }
}
