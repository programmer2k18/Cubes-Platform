<?php

namespace App\Http\Controllers\coworkingSpaceControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\AuthCoworking;

class Announcements extends Controller
{
    public function __construct(){
        $this->middleware('AuthCoworking');
    }

    public function getAllAnnouncements(){

        $co_id = \request()->session()->get('admin')->id;
        $posts = \App\appModels\announcements::getLateastPosts($co_id);
        return view('dashboard.posts.allPosts')->with('posts',$posts);
    }

    public function addAnnouncementForm(){
        return view('dashboard.posts.addNewPost');
    }

    public function addAnnouncement(Request $request)
    {
        $this->checkInputs($request);
        \App\appModels\announcements::addPost($request);
        return redirect(route('allAnnouncements'))
            ->with('added_msg','Posted successfully');
    }

    public function checkInputs(Request $request){

        if($request->hasFile('image')){
            $this->validate($request,[
                'body'=>'required|string|max:1500',
                'image'=>'file|image|mimes:jpg,jpeg,png,gif|max:3068'
            ]);
        }else{
            $this->validate($request,[
                'body'=>'required|string']);
        }

    }

    public function editAnnouncementForm($id){

        $post = \App\appModels\announcements::getAnnouncementByID($id);
        return view('dashboard.posts.editPost')->with('post',$post);

    }
    public function editAnnouncement(Request $request, $id){
        $this->checkInputs($request);
        \App\appModels\announcements::editAnnouncement($request,$id);
        return redirect(route('allAnnouncements'))
            ->with('added_msg',' Post updated successfully');
    }

    public function deleteAnnouncement(Request $request){

        if ($request->ajax()){
            \App\appModels\announcements::deleteAnnouncement($request->id);
            return response()->json(['Massage'=>'deleted successfully']);
        }
    }

}
