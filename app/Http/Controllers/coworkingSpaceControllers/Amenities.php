<?php

namespace App\Http\Controllers\coworkingSpaceControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ImageHandeller;
use App\Http\Middleware\AuthCoworking;

class Amenities extends Controller
{

    public function __construct(){
        $this->middleware('AuthCoworking');
    }

    public function addAmenityForm(){
        return view('dashboard.amenities.add');
    }

    public function checkInputs(Request $request){

        if($request->hasFile('image')){
            $this->validate($request,[
                'type'=>'required', 'description'=>'required', 'name'=>'required',
                'image'=>'file|image|mimes:jpg,jpeg,png,gif|max:3068'
            ]);
        }else{
            $this->validate($request,[
                'type'=>'required', 'description'=>'required|string', 'name'=>'required|string',]);
        }

    }
    public function addAmenity(Request $request){

        $this->checkInputs($request);
        \App\appModels\amenities::addAmenity($request);
        return redirect(route('Amenitytype',$request->input('type')))
            ->with('added_msg',$request->input('name').' added successfully');
    }

    public function getAmenitiesByType($type){

        $check = ['Equipments','Facilities','Community','Cool_Stuff'];
        $co_id = \request()->session()->get('admin')->id;
        if(in_array($type,$check)){
            $amenities =  \App\appModels\amenities::getAmenities($type,$co_id);
            return view('dashboard.amenities.amenitiesByType')->with([
                'type'=>$type,
                'amenities'=>$amenities
            ]);
        }else{
            return view('dashboard.errorPage');
        }
    }

    public function editAmenityForm($id){

        $amenity = \App\appModels\amenities::getAmenityByID($id);
        return view('dashboard.amenities.editAmenity')->with('amenity',$amenity);

    }
    public function editAmenity(Request $request, $id){
        $this->checkInputs($request);
        \App\appModels\amenities::editAmenity($request,$id);
        return redirect(route('Amenitytype',$request->input('type')))
            ->with('added_msg',' Amenity updated successfully');
    }
    public function deleteAmenity(Request $request){

        if ($request->ajax()){
            \App\appModels\amenities::deleteAmenity($request->id);
            return response()->json(['Massage'=>'deleted successfully']);
        }
    }


}

