<?php

namespace App\appModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class announcements extends Model
{

    protected $fillable = ['co_id','body','image'];

    public static function addPost(Request $request){
        $folderPath = \App\ImageHandeller::makeDirectory('Announcements_images');
        DB::table('announcements')->insert([
            'co_id'=>$request->session()->get('admin')->id,
            'body'=>htmlspecialchars(trim($request->input('body'))),
            'image'=>\App\ImageHandeller::
            saveImage($request,$folderPath),
        ]);
    }

    public static function getLateastPosts($co_id){

        return DB::table('announcements')->where('co_id','=',$co_id)
            ->latest()->paginate(10);
    }

    public static function getLateastPostsForApi($co_id){

        return DB::table('announcements')->where('co_id','=',$co_id)
            ->latest()->get();
    }

    public static function getAnnouncementByID($id){
        return DB::table('announcements')->
        where('id','=',$id)->first();
    }

    public static function editAnnouncement(Request $request, $id){

        if ($request->hasFile('image')){
            $folderPath = \App\ImageHandeller::makeDirectory('Announcements_images');
            DB::table('announcements')->where('id','=',$id)
                ->update([
                    'body'=>htmlspecialchars(trim($request->input('body'))),
                    'image'=>\App\ImageHandeller::saveImage($request,$folderPath),
                ]);
        }else{
            DB::table('announcements')->where('id','=',$id)
                ->update([
                    'body'=>htmlspecialchars(trim($request->input('body'))),
                ]);
        }
    }

    public static function deleteAnnouncement($id){
        $path = DB::table('announcements')->where('id','=',$id)
            ->first();
        \App\ImageHandeller::deleteImage($path->image);
        DB::table('announcements')->where('id','=',$id)->delete();
    }
}
