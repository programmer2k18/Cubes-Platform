<?php

namespace App\appModels;

use Illuminate\Database\Eloquent\Model;
use App\appModels\co_images;
use Illuminate\Encryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class coworkingSpace extends Model
{
    use Notifiable;

    public function coworkingImages(){
        return $this->hasMany('App\appModels\co_images','co_id');
    }

    public static function getPlaceInformation($co_id){
        return coworkingSpace::where('id','=',$co_id)->first();
    }

    public static function activeCoworkingSpaces(){
        return coworkingSpace::where('status','activated')->paginate(1);
    }

    public static function pendingCoworkingSpaces(){
        return coworkingSpace::where('status','pending')->paginate(15);
    }

    public static function activateCoworkingSpace($co_id){
        $status = coworkingSpace::where('id','=',$co_id)->update([
            'password'=>uniqid('#156$%',true),
            'status'=>'activated'
        ]);
        if ($status)
            return coworkingSpace::getPlaceInformation($co_id);
        return $status;
    }

    public static function searchForSpace($word){

       return coworkingSpace::where('name','like','%'.$word.'%')->
        orWhere('city','like','%'.$word.'%')->
        orWhere('governorate','like','%'.$word.'%')->
        orWhere('street','like','%'.$word.'%')->get();
    }

    public static function updateProfile(Request $request, $co_id){

        coworkingSpace::where('id','=',$co_id)->update([
            'name'=>trim($request->name),
            'email'=>trim($request->email),
            'password'=>trim($request->password),
            'description'=>htmlspecialchars(trim($request->description)),
            'governorate'=>trim($request->government),
            'city'=>trim($request->city),
            'street'=>trim($request->street),
        ]);

        if ($request->hasFile('image')){
            if ($request->checkImage!==null){
                \App\ImageHandeller::deleteImage($request->checkImage);
            }
            $folderPath = \App\ImageHandeller::makeDirectory('main_image');
            $imagePath = \App\ImageHandeller::saveImage($request,$folderPath);
            coworkingSpace::where('id','=',$co_id)->update([
                'image'=>$imagePath
            ]);
        }
        $co = coworkingSpace::where('id','=',$co_id)->first();
        $request->session()->put('admin',$co);
    }
}
