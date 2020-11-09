<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImageHandeller
{

    public static function saveImage(Request $request,$folderPath){
        $path = null;
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $path = $file->storeAs($folderPath,$name);
        }
        return $path;
    }

    public static function saveMultipleImages($files,$folderPath){

        $pathes = array();
        foreach ($files as $file){

            $extension = $file->getClientOriginalExtension();
            $name = time().$file->getClientOriginalName();
            $path = $file->storeAs($folderPath,$name);
            $pathes[]=$path;
        }
        return $pathes;
    }

    public static function makeDirectory($folderName){
        $co_name =trim(request()->session()->get('admin')->name);
        $co_email =trim(request()->session()->get('admin')->email);
        $folderPath = '/Coworking Spaces/'.$co_name.'&'.$co_email.'/'.$folderName;
        if(!Storage::disk('public')->exists($folderPath)){
            Storage::disk('public')->makeDirectory($folderPath);
        }
        return $folderPath;
    }

    public static function deleteImage($imagePath){
        if(Storage::disk('public')->exists($imagePath))
            Storage::disk('public')->delete($imagePath);
    }

    public static function convertToBase64($data){
        foreach ($data as $record){
            if ($record->image){
                $imgData = file_get_contents('storage/'.$record->image);
                $convertedImage = base64_encode($imgData);
                $record->image = $convertedImage;
            }
        }
        return $data;
    }






}