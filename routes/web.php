<?php
use App\appModels\Prediction\BookingPredictor;
use App\appModels\Classification\UserBookingStatusClassifier;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::pattern('id','[0-9]+');
Route::pattern('co_id','[0-9]+');

//login routes
Route::get('/dashboard/login','coworkingSpaceControllers\loginController@index')->name('dashLoginForm');
Route::post('/dashboard/loginUser','coworkingSpaceControllers\loginController@login')->name('signIn');
Route::get('/dashboard','coworkingSpaceControllers\loginController@showdashboard')->name('dashboard');

//logout route
Route::get('/dashboard/logout','coworkingSpaceControllers\loginController@logoutCoworkingSpace')->name('logout');

//profile routes
Route::prefix('/dashboard/profile')->group(function () {
    Route::get('/{co_id}','coworkingSpaceControllers\Profile@getProfile')->name('profile');
    Route::put('/update/{co_id}','coworkingSpaceControllers\Profile@updateProfile')->name('updateProfile');
    Route::get('/profit','coworkingSpaceControllers\Profile@getProfit')->name('getProfit');

});

//charts routes
Route::prefix('/dashboard/charts')->group(function () {

    Route::get('/test',function (){


        /*$ob = new BookingPredictor();
        $ob->getDataFromDB();
        $ob->preProcessingData();
        return $ob->testAccuracy();*/
    });

    Route::get('/Booking_Analysis','coworkingSpaceControllers\ChartsController@bookingAnalysis')->name('bookingAnalysis');
    Route::get('/Profit_Analysis','coworkingSpaceControllers\ChartsController@profitAnalysis')->name('profitAnalysis');
    Route::get('/Users_Analysis','coworkingSpaceControllers\ChartsController@usersAnalysis')->name('usersAnalysis');

});

//forecasting next month booking requests
Route::prefix('/dashboard')->group(function () {
    Route::get('/forecasting','coworkingSpaceControllers\ChartsController@forecastingNextMonthRequestsView')->name('forecastingView');
    Route::get('/filtered_forecasting','coworkingSpaceControllers\ChartsController@forecastingNextMonthRequests')->name('forecasting');
});

//Booking routes
Route::prefix('/dashboard/Booking')->group(function () {

    // make booking requests routes
    Route::get('/Book_Now/{Asset_id}/{type}','coworkingSpaceControllers\Booking@getBookingForm')
        ->name('getBookingForm');
    Route::post('/Book_Now/{Asset_id}','coworkingSpaceControllers\Booking@makeBookingRequest')
        ->name('bookNow');
    // get different booking requests routes
    Route::get('/Booked_Now','coworkingSpaceControllers\Booking@currentBookedRequests')
        ->name('currentBookedRequests');
    Route::get('/Upcoming_Requests','coworkingSpaceControllers\Booking@upComingRequests')
        ->name('upComingRequests');
    Route::get('/History', 'coworkingSpaceControllers\Booking@getBookingHistory')
        ->name('BookingHistory');
    Route::get('/Canceled_Requests', 'coworkingSpaceControllers\Booking@getCanceledRequests')
        ->name('CanceledRequests');
    //do some operations on booking requests routes
    Route::get('/verify/{id}','coworkingSpaceControllers\Booking@verifyRequest')
        ->name('verify');
    Route::post('/delete','coworkingSpaceControllers\Booking@deleteRequest')
        ->name('deleteRequest');
    Route::get('/close/{id}','coworkingSpaceControllers\Booking@closeRequest')
        ->name('close');
    Route::get('/sendEmail/{id}','coworkingSpaceControllers\Booking@sendEmail')
        ->name('sendEmail');
});

//current view routes
Route::prefix('/dashboard/views')->group(function () {

    Route::get('/add','coworkingSpaceControllers\realTimeView@addViewForm')
           ->name('addViewForm');
    Route::post('/add', 'coworkingSpaceControllers\realTimeView@addView')
           ->name('addView');
    Route::get('/AllViews', 'coworkingSpaceControllers\realTimeView@getAllViews')
        ->name('getAllViews');
    Route::post('/delete','coworkingSpaceControllers\realTimeView@deleteView')
           ->name('deleteView');
});

// co-working assets routes
Route::prefix('/dashboard/assets')->group(function (){

    Route::get('/add','coworkingSpaceControllers\coworkingSeatings@create')->name('addAssetForm');

    Route::post('/add',
        'coworkingSpaceControllers\coworkingSeatings@addNewSeat')->name('addSeating');

    Route::get('/{type}','coworkingSpaceControllers\coworkingSeatings@getAssets')->name('getAssetsByType');

    Route::get('/edit/{id}','coworkingSpaceControllers\coworkingSeatings@editAssetForm')->name('editAssetForm');
    Route::put('/edit/{id}','coworkingSpaceControllers\coworkingSeatings@editAsset')->name('editAsset');

    Route::post('/delete','coworkingSpaceControllers\coworkingSeatings@deleteAsset')->name('deleteAsset');
});

// Amenities Routes
Route::prefix('/dashboard/Amenities')->group(function () {

    Route::get('/add','coworkingSpaceControllers\Amenities@addAmenityForm')->name('addAmenityForm');
    Route::post('/add',
        'coworkingSpaceControllers\Amenities@addAmenity')->name('addAmenity');

    Route::get('/{type}','coworkingSpaceControllers\Amenities@getAmenitiesByType')->name('Amenitytype');
    Route::get('/edit/{id}','coworkingSpaceControllers\Amenities@editAmenityForm')->name('editAmenityForm');
    Route::post('/edit/{id}','coworkingSpaceControllers\Amenities@editAmenity')->name('editAmenity');
    Route::post('/delete','coworkingSpaceControllers\Amenities@deleteAmenity')->name('deleteAmenity');
});

//Announcements routes
Route::prefix('/dashboard/Announcements')->group(function () {

    Route::get('/add','coworkingSpaceControllers\Announcements@addAnnouncementForm')->
            name('addAnnouncementForm');
    Route::post('/add',
        'coworkingSpaceControllers\Announcements@addAnnouncement')->name('addAnnouncement');

    Route::get('/all','coworkingSpaceControllers\Announcements@getAllAnnouncements')->
            name('allAnnouncements');

    Route::get('/edit/{id}','coworkingSpaceControllers\Announcements@editAnnouncementForm')->name('editAnnouncementForm');
    Route::post('/edit/{id}','coworkingSpaceControllers\Announcements@editAnnouncement')->name('editAnnouncement');
    Route::post('/delete','coworkingSpaceControllers\Announcements@deleteAnnouncement')->
            name('deleteAnnouncement');
});

//Co-working Opening times routes
Route::prefix('/dashboard/Opening_times')->group(function () {

    Route::get('/add','coworkingSpaceControllers\openingTimes@addOpeningTimeForm')
           ->name('addOpeningTimeForm');
    Route::post('/add', 'coworkingSpaceControllers\openingTimes@addOpeningTime')
           ->name('addOpeningTime');
    Route::get('/all','coworkingSpaceControllers\openingTimes@getAllOpeningTimes')
           ->name('allOpeningTimes');
    Route::get('/edit/{id}','coworkingSpaceControllers\openingTimes@editOpeningTimeForm')
           ->name('editOpeningTimeForm');
    Route::post('/edit/{id}','coworkingSpaceControllers\openingTimes@editOpeningTime')
           ->name('editOpeningTime');
    Route::post('/delete','coworkingSpaceControllers\openingTimes@deleteOpeningTime')
           ->name('deleteOpeningTime');
});

//Co-working reviews routes
Route::prefix('/dashboard/Reviews')->group(function () {

    Route::get('/all','coworkingSpaceControllers\Reviews@getAllReviews')
        ->name('getAllReviews');
    Route::post('/delete','coworkingSpaceControllers\Reviews@deleteReview')
        ->name('deleteReview');
});

//support messages routes
Route::prefix('/dashboard/support')->group(function () {

    Route::get('/compose/{co_id}/{userEmail?}','coworkingSpaceControllers\CustomerSupport@getComposeForm')
        ->name('getComposeForm');
    Route::post('/compose/{co_id}','coworkingSpaceControllers\CustomerSupport@composeMessage')
        ->name('composeMessage');
    Route::get('/inbox/{co_id}','coworkingSpaceControllers\CustomerSupport@getInbox')
        ->name('getInbox');
    Route::get('/sentMessages/{co_id}','coworkingSpaceControllers\CustomerSupport@getSentMessages')
        ->name('getSentMessages');
    Route::post('/delete','coworkingSpaceControllers\CustomerSupport@deleteMessage')
        ->name('deleteMessage');
});


//offers routes
Route::group(['prefix' => '/dashboard/offers'], function () {

    Route::get('/add/{user_id?}','coworkingSpaceControllers\Offer@addOfferForm')
        ->name('addGeneralOfferForm');
    Route::post('/add/{user_id?}','coworkingSpaceControllers\Offer@addOffer')
        ->name('addOffer');
    Route::get('/general','coworkingSpaceControllers\Offer@generalOffers')->name('generalOffers');

    Route::get('/customized','coworkingSpaceControllers\Offer@customizedOffers')
            ->name('customizedOffers');
    Route::get('/customized/people/{order?}','coworkingSpaceControllers\Offer@getPeopleToSendOffers')
            ->name('peopleToSendOffers');

    Route::get('/edit/{id}','coworkingSpaceControllers\Offer@getEditOfferForm')
           ->name('getEditOfferForm');
    Route::post('/edit/{id}','coworkingSpaceControllers\Offer@editOffer')
           ->name('editOffer');
    Route::get('/endOffer/{id}','coworkingSpaceControllers\Offer@closeOffer')
        ->name('closeOffer');       
});


// ********************** Cubes Dashboard Routes********************************************

Route::group(['prefix' => '/Cubes/dashboard'], function () {

    Route::get('/profile','cubesControllers\CubesController@CubesProfile')->name('CubesProfile');

    Route::get('/Co-Working/active','cubesControllers\CubesController@getActivatedCoWorkingSpaces')
           ->name('activeSpaces');

    Route::get('/Co-Working/pending','cubesControllers\CubesController@getPendingCoWorkingSpaces')
           ->name('pendingSpaces');

    Route::get('/Co-Working/activate/{co_id}',
        'cubesControllers\CubesController@activateCo_WorkingSpace')->name('activateCoWorkingSpace');


});

//followers routes
Route::get('/dashboard/followers',function (){
    return view('dashboard.followers.followers');
});
Route::get('/dashboard/followers/gold',function (){
    return view('dashboard.followers.goldenFollowers');
});



/*//events routes
Route::get('/dashboard/events/available',function (){
    return view('dashboard.AvailableEvents');
});
Route::get('/dashboard/events/expired',function (){
    return view('dashboard.expiredEvents');
});
Route::get('/dashboard/events/add',function (){
    return view('dashboard.addEvent');
});
Route::get('/dashboard/events/{id}',function (){
    return view('dashboard.showFullEventDetails');
});

//followers routes
Route::get('/dashboard/followers',function (){
    return view('dashboard.followers.followers');
});
Route::get('/dashboard/followers/gold',function (){
    return view('dashboard.goldenFollowers');
});

//blocked users
Route::get('/dashboard/blocked_users',function (){
    return view('dashboard.allBlockedUsers');
});
Route::get('/dashboard/blockUser/{id}',function (){
    return view('dashboard.blockUser');
});

*/
