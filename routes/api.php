<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Route::pattern(['co_id'=>'[0-9]+','asset_id'=>'[0-9]+']);
// customer access endpoints
Route::post('/register','userApiControllers\AuthCustomerController@register');
Route::post('/login','userApiControllers\AuthCustomerController@login');

//co-working space
Route::get('/test','userApiControllers\CoworkingSpace@test');

Route::get('/assets/{co_id}','userApiControllers\CoworkingSpace@getCoworkingAssets');
Route::get('/CoworkingAnnouncements/{co_id}','userApiControllers\CoworkingSpace@getCoworkingAnnouncements');
Route::get('/CoworkingViews/{co_id}','userApiControllers\CoworkingSpace@getCoworkingViews');
Route::get('/CoworkingAmenities/{co_id}','userApiControllers\CoworkingSpace@getCoworkingAmenities');

//reviews endpoints
Route::post('/review/{co_id}','userApiControllers\Reviews@addReview');
Route::get('/reviews/{co_id}','userApiControllers\Reviews@getAllReviews');
Route::get('/User_reviews','userApiControllers\Reviews@getReviewsForUser');

//search co-working spaces endpoints
Route::get('/search/{word}','userApiControllers\CoworkingSpace@searchForCoworkingSpace');

//booking endpoints
Route::post('/book/{co_id}/{asset_id}','userApiControllers\Booking@makeBookingRequest');
Route::get('/booking_history','userApiControllers\Booking@getBookingHistoryForUser');
Route::get('/cancel_Booking_Request/{co_id}','userApiControllers\Booking@cancelBookingRequest');




