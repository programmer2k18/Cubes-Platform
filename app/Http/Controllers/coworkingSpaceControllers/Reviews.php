<?php

namespace App\Http\Controllers\coworkingSpaceControllers;

use App\appModels\co_reviews;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\AuthCoworking;

class Reviews extends Controller
{

    public function __construct(){
        $this->middleware('AuthCoworking');
    }

    public function getAllReviews(){
        $co_id = request()->session()->get('admin')->id;
        $reviews = co_reviews::getAllReviews($co_id);
        return view('dashboard.reviews.reviews')->with('reviews',$reviews);
    }

    public function deleteReview(Request $request){

        if ($request->ajax()){
            \App\appModels\co_reviews::deleteReview($request->id);
            return response()->json(['Massage'=>'deleted successfully']);
        }
    }

}
