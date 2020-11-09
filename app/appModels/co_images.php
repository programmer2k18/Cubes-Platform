<?php

namespace App\appModels;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class co_images extends Model
{

    protected $fillable = ['co_id','type'];

    public static function saveImages(Request $request){

        $folderPath = \App\ImageHandeller::makeDirectory('Coworking views');
        $images = $request->file('images');
        $paths = \App\ImageHandeller::saveMultipleImages($images,$folderPath);

        $co_id = $request->session()->get('admin')->id;
        foreach ($paths as $path){
            DB::table('co_images')->insert([
                'co_id'=>$co_id,
                'image'=>$path
            ]);
        }
    }

    public static function getAllImages($co_id){
        return DB::table('co_images')->where('co_id','=',$co_id)
            ->latest()->get();
    }

    public static function deleteImage($id){
        $path = DB::table('co_images')->where('id','=',$id)
            ->first();
        \App\ImageHandeller::deleteImage($path->image);
        DB::table('co_images')->where('id','=',$id)->delete();
    }
}
