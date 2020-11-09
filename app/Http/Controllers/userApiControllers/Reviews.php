<?php

namespace App\Http\Controllers\userApiControllers;

use App\appModels\co_reviews;
use App\ImageHandeller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Reviews extends Controller
{

    public function __construct(){
        $this->middleware('auth:api')->except('getAllReviews');
    }

    public function getAllReviews($co_id){

        $reviews = co_reviews::getAllReviews($co_id);
        $reviews = ImageHandeller::convertToBase64($reviews);
        return response()->json(['reviews'=>$reviews,'status'=>'success'],200);
    }

    public function addReview(Request $request, $co_id){

        $this->validate($request,['review'=>'required|string|max:300']);
        \App\appModels\co_reviews::addReview($request,$co_id);
        return response()->json(['message'=>'Review added Successfully',
            'status'=>'success'],200);
    }
    public function getReviewsForUser(){
        $user_id = auth()->user()->id;
        $reviews =  co_reviews::getReviewsByUserID($user_id);
        if (count($reviews) > 0)
            return response()->json(['reviews'=>$reviews,'user'=>auth()->user(),'status'=>'success'],200);
        return response()->json(['message'=>'No reviews made yet.','status'=>'failed'],401);
    }

}
