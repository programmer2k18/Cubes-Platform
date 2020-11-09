<?php

namespace App\Http\Controllers\coworkingSpaceControllers;

use App\appModels\co_images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Middleware\AuthCoworking;


class realTimeView extends Controller
{
    public function __construct(){
        $this->middleware('AuthCoworking');
    }

    public function addViewForm(){
        return view('dashboard.currentView.addCurrentView');
    }

    private function checkImages(Request $request){
        $this->validate($request,[
            'images.*'=>'required|file|image|mimes:jpg,jpeg,png,gif|max:5000'
        ]);
    }

    public function addView(Request $request){


        $this->checkImages($request);
        co_images::saveImages($request);
        if(Cache::has('co_images')){
            Cache::forget('co_images');
        }
        return redirect(route('getAllViews'))->
        with('added_msg','Current View added successfully');
    }
    public function getAllViews(){

        $co_id = \request()->session()->get('admin')->id;
        if(!Cache::has('co_images')){
            $images = co_images::getAllImages($co_id);
            Cache::put('co_images',$images,1200);
        }
        return view('dashboard.currentView.currentView');
    }
}
