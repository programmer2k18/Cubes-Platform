<?php

namespace App\Http\Controllers\coworkingSpaceControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\AuthCoworking;
use App\appModels\Prediction\BookingPredictor;

class ChartsController extends Controller
{
    function __construct(){
        $this->middleware('AuthCoworking');
    }

    function bookingAnalysis(){

        $booking =  \App\appModels\ChartsDBQueries::getBookingRequestsThisYear();
        $cancelledReq = \App\appModels\ChartsDBQueries::getCanceledRequests();
        $mostBookedAssets = \App\appModels\ChartsDBQueries::getMostBookedAssets();
        $mostBookedRegions = \App\appModels\ChartsDBQueries::getMostBookedRegions();
        return view('dashboard.analysis.bookingAnalysis',[
            'booking'=>$booking,
            'mostAssets'=>$mostBookedAssets,
            'mostRegions'=>$mostBookedRegions,
            'cancelledRequests'=>count($cancelledReq)
        ]);
    }

    function profitAnalysis(){
        $co_id = request()->session()->get('admin')->id;
        $currentYearProfit =  \App\appModels\co_booking::
                 getProfitForMonthForCoworker($co_id, \Carbon\Carbon::now()->year);
        $lastYearProfit =  \App\appModels\co_booking::
        getProfitForMonthForCoworker($co_id, (\Carbon\Carbon::now()->year)-1);

        $currentYearProfit = $this->reshapeProfitData($currentYearProfit);
        $lastYearProfit = $this->reshapeProfitData($lastYearProfit);

        return view('dashboard.analysis.profitAnalysis',[
            'currentYear'=>$currentYearProfit,
            'lastYear'=>$lastYearProfit
        ]);
    }

    function reshapeProfitData($booking){
        $dataCollect = collect();  $sum = 0;
        $booking->map(function ($item) use ($sum,$dataCollect){
            $month = explode(" ", $item[0]->from);
            foreach ($item as $t){
                $sum+= $t->cost;
            }
            $dataCollect->put($month[0],$sum);
            $sum=0;
        });
        return $dataCollect;
    }

    function usersAnalysis(){
        $mostBookedAssets = \App\appModels\ChartsDBQueries::getTop10BookedUsers();
        $ages = \App\appModels\ChartsDBQueries::getFrequentlyBookedUsersAges();
        $under25year = $ages->where('age','<',25)->values()->count();
        $between = $ages->whereBetween('age',[25,50])->values()->count();
        $above50year = $ages->where('age','>',50)->values()->count();
        $ages = array($under25year,$between,$above50year);
        return view('dashboard.analysis.usersAnalysis',
            ['users'=>$mostBookedAssets,'ages'=>$ages]);
    }

    function forecastingNextMonthRequestsView(){
        return view('dashboard.forecasting.forecasting');
    }
    function forecastingNextMonthRequests(Request $request){

        if ($request->ajax()){
            $predictor = new BookingPredictor();
            $month = \Carbon\Carbon::now()->month;
            $year = \Carbon\Carbon::now()->year;
            if ($month == 12){ $month = 1; $year+=1;}
            else $month++;

            $resource = $this->prepareInputs($request->resource,$year,$month);
            $result=[];
            foreach ($resource as $res){
                $predicted = $predictor->predict([$res['data']],$request->data_period)[0];
                $result[] =['resource'=>$res['name'], 'value'=>$predicted] ;
            }
            return response()->json($result,200);
        }
    }

    function prepareInputs($resource,$year, $month){
        $res = ['Private Offices'=>['name'=>'Private Offices','data'=>[1,0,0,$year,$month]],
                'Meeting Rooms'=>['name'=>'Meeting Rooms','data'=>[0,1,0,$year,$month]],
                'Shared Space'=>['name'=>'Shared Space','data'=>[0,0,1,$year,$month]]];
        if ($resource == "all")
            return[$res['Private Offices'],$res['Meeting Rooms'],$res['Shared Space']];
        return [$res[$resource]];
    }

    function test(){
        $booking =  \App\Charts\ChartsDBQueries::getBookingRequestsThisYear();
        return view('dashboard.dashboard',compact('booking'));
    }
}
