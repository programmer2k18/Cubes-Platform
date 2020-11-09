<?php

namespace App\Http\Controllers\userApiControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Validator;
use App\appModels\User;

class AuthCustomerController extends Controller
{
    public function register(Request $request){

        $data = $this->validateInputs($request);
        $data['password'] = bcrypt($data['password']);
        $customer = User::create($data);
        $accessToken = $customer->createToken('authToken')->accessToken;
        return response()->json(['user'=>$customer,
            'authToken'=>$accessToken,"status" => "success"],200);
    }

    public function login(Request $request){

        //important may encrypt the password (hint)

        $loginData = $this->validateLoginData($request);
        if(!auth()->attempt($loginData,true)){
            return response()->json(["status" => "failed",
                'error'=>'Email or Password are not exist.'],401);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response()->json(['user'=>auth()->user(),
            'authToken'=>$accessToken,"status" => "success"],200);
    }

    private function validateInputs(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>['required','unique:customers','max:40','email'],
            'password'=>['required','min:8','max:15'],
            'governorate'=>'required',
            'city'=>'required',
            'street'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'phone'=>'required',
        ]);
        if ($validator->fails())
        { return response()->json(['error'=>$validator->errors(),"status" => "failed"], 401);}
        else
            return $validator;
    }
    private function validateLoginData(Request $request){

        $validator = Validator::make($request->all(),[
            'email'=>['required','max:40','email'],
            'password'=>['required','min:8','max:15'],
        ]);
        if ($validator->fails())
        { return response()->json(['error'=>$validator->errors(),"status" => "failed"], 401);}
        else
            return $validator;
    }
}
