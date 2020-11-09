<?php

namespace App\Http\Controllers\coworkingSpaceControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\appModels\co_seating_desks;
use App\Http\Middleware\AuthCoworking;


class coworkingSeatings extends Controller
{
    public function __construct(){
        $this->middleware('AuthCoworking');
    }

    public function validateInputs(Request $request){

        $this->validate($request,[
            'type'=>'required',
            'description'=>'required',
            'capacity'=>'required',
            'price'=>'required',
            'currency'=>'required',
            'pricePeriod'=>'required',
        ]);
    }

    public function create(){
        return view('dashboard.assets.addNewSeatings');
    }
    public function addNewSeat(Request $request){

        $this->validateInputs($request);
        co_seating_desks::AddAsset($request);
        return redirect('/dashboard/assets/'.$request->input('type'))->
        with('added_msg', $request->input('type').' Added Successfully to your place.');
    }

    public  function getAssets($type){

        $check = ['Meeting_rooms','General_Assets','Private_offices'];
        if(in_array($type,$check)){
            $assets = co_seating_desks::getAssetsByType($type);
            return view('dashboard.assets.assetsByType')->
            with(['assets'=>$assets,'type'=>$type]);
        }else{
            return view('dashboard.errorPage');
        }

    }

    public function editAssetForm($id){
        $data =co_seating_desks::getAssetById($id);
        return view('dashboard.assets.editAsset')
            ->with('asset',$data);
    }

    public function editAsset(Request $request, $id){
        $this->validateInputs($request);
        co_seating_desks::editCoworkingAsset($request,$id);
        return redirect('/dashboard/assets/'.$request->input('type'))->
        with('added_msg','Asset Updated Successfully');
    }
    public function deleteAsset(Request $request){

        if($request->ajax()){
            co_seating_desks::deleteAsset($request);
            return response()->json(['message'=>'Deleted Successfully']);
        }
    }

}
