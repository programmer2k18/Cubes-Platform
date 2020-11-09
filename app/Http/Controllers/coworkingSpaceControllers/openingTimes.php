<?php

namespace App\Http\Controllers\coworkingSpaceControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\AuthCoworking;


class openingTimes extends Controller
{
    public function __construct(){
        $this->middleware('AuthCoworking');
    }
    public function getAllOpeningTimes(){

        $id = \request()->session()->get('admin')->id;
        $times = \App\appModels\co_openingHours::getLateastOpeningTimes($id);
        return view('dashboard.openingTime.openingHours')->with('times',$times);
    }

    public function addOpeningTimeForm(){
        return view('dashboard.openingTime.addOpeningHours');
    }

    public function addOpeningTime(Request $request)
    {
        $this->checkInputs($request);
        \App\appModels\co_openingHours::addOpeningTime($request);
        return redirect(route('allOpeningTimes'))
            ->with('added_msg','Time Added successfully');
    }

    public function checkInputs(Request $request){

        $this->validate($request,[
            'day'=>'required|string',
            'from'=>'required',
            'to'=>'required',
        ]);
    }

    public function editOpeningTimeForm($id){

        $openingTime = \App\appModels\co_openingHours::getOpeningTimeByID($id);
        return view('dashboard.openingTime.editOpeningHours')->with('time',$openingTime);
    }
    public function editOpeningTime(Request $request, $id){
        $this->checkInputs($request);
        \App\appModels\co_openingHours::editOpeningTime($request,$id);
        return redirect(route('allOpeningTimes'))
            ->with('added_msg',' Time updated successfully');
    }

    public function deleteOpeningTime(Request $request){

        if ($request->ajax()){
            \App\appModels\co_openingHours::deleteOpeningTime($request->id);
            return response()->json(['Massage'=>'deleted successfully']);
        }
    }

}
