<?php

namespace App\appModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class amenities extends Model
{
    protected $fillable = ['co_id','type','name','image','description'];

    public static function addAmenity(Request $request){
        $folderPath = \App\ImageHandeller::makeDirectory('amenities_images/'.$request->input('type'));
        DB::table('amenities')->insert([
            'co_id'=>$request->session()->get('admin')->id,
            'name'=>$request->input('name'),
            'type'=>$request->input('type'),
            'description'=>trim($request->input('description')),
            'image'=>\App\ImageHandeller::saveImage($request,$folderPath),
        ]);
    }
    public static function getAmenities($type,$co_id){
        if ($type!=''){
            return DB::table('amenities')->where('co_id','=',$co_id)->
            where('type','=',$type)->latest()->paginate(6);
        }
    }
    public static function getAmenitiesByApi($co_id){

            return DB::table('amenities')->where('co_id','=',$co_id)
                ->orderBy('type')->get();
    }
    public static function editAmenity(Request $request, $id){

        if ($request->hasFile('image')){
            $folderPath = \App\ImageHandeller::
            makeDirectory('amenities_images/'.$request->input('type'));
            DB::table('amenities')->where('id','=',$id)
                ->update([
                    'name'=>$request->input('name'),
                    'type'=>$request->input('type'),
                    'description'=>trim($request->input('description')),
                    'image'=>\App\ImageHandeller::saveImage($request,$folderPath),
                ]);
        }else{
            DB::table('amenities')->where('id','=',$id)
                ->update([
                    'name'=>$request->input('name'),
                    'type'=>$request->input('type'),
                    'description'=>trim($request->input('description')),
                ]);
        }
    }

    public static function getAmenityByID($id){
        return DB::table('amenities')->
        where('id','=',$id)->first();
    }

    public static function deleteAmenity($id){
        $path = DB::table('amenities')->where('id','=',$id)
            ->first();
        \App\ImageHandeller::deleteImage($path->image);
        DB::table('amenities')->where('id','=',$id)->delete();
    }

}
