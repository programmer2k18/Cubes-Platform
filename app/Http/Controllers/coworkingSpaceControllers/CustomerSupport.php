<?php

namespace App\Http\Controllers\coworkingSpaceControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\AuthCoworking;

class CustomerSupport extends Controller
{
    public function __construct(){
        $this->middleware('AuthCoworking');
    }
    public function getComposeForm($co_id,$userEmail=null){
        return view('dashboard.support.supportComposeEmail')
            ->with(['co_id'=>$co_id,'userEmail'=>$userEmail]);
    }
    public function composeMessage(Request $request,$co_id){

        $this->validate($request,[
            'to'=>'required|email',
            'message'=>'required|string|max:500',
            'subject'=>'required|string|max:120',
        ]);
        \App\appModels\customerSupport::saveMessage($request,$co_id);
        return redirect(route('getSentMessages',$co_id))
            ->with('added_msg','Email sent successfully to '. trim($request->to));
    }

    public function getInbox($co_id){
        $inboxMessages = \App\appModels\customerSupport::getInboxMessages($co_id);
        return view('dashboard.support.supportInboxEmails')->with(['emails'=>$inboxMessages]);
    }

    public function getSentMessages($co_id){
        $sentMessages = \App\appModels\customerSupport::getSentMessages($co_id);
        return view('dashboard.support.supportSentEmails')->with(['emails'=>$sentMessages]);
    }

    public function deleteMessage(Request $request){
        if ($request->ajax()){
            \App\appModels\customerSupport::deleteMessage($request->id);
            return response()->json(['Massage'=>'deleted successfully']);
        }
    }
}
