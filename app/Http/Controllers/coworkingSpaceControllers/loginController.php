<?php

namespace App\Http\Controllers\coworkingSpaceControllers;
use App\Http\Controllers\Controller;
use App\appModels\coworkingSpace;
use App\appModels\co_images;
use Illuminate\Http\Request;
use App\Http\Middleware\AuthCoworking;

session_start();
class loginController extends Controller
{
    public function __construct(){
        $this->middleware('AuthCoworking')->except(['login','index']);
    }
    public function index(){
        if(request()->session()->exists('admin')&&
            request()->session()->has('admin')){
            return redirect(route('bookingAnalysis'));
        }else{
            return view('dashboard.login');
        }
    }

    public function showdashboard(){
        return redirect(route('bookingAnalysis'));
    }

    public function validateLoginData(Request $request){
        $this->validate($request,[
            'email'=>'required|email|string',
            'password'=>'required|string|max:30|min:6'
        ]);
    }

    public function login(Request $request){
        $this->validateLoginData($request);
        $admin = coworkingSpace::where('email','=',trim($request->email))
        ->where('password','=',$request->password)->first();
        if(!$admin){
            return redirect()->back()->
            with('msg',"Email and Password don't match: ".$request->email);
        }else{

            $request->session()->put('admin',$admin);
            return redirect(route('bookingAnalysis'));
        }
    }

    public function logoutCoworkingSpace(){

        if(\request()->session()->has('admin')){
            request()->session()->invalidate();
            return redirect('/dashboard/login');
        }
    }
}
