<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
    	$validator=Validator::make($request->all(),[
    		'name' => 'required',
    		'email' =>'required|email',
    		'password' =>'required'

    	]);

    	if($validator->fails()){
    		return response()->json(['status_code'=>400,'message'=>'Bad Request']);
    	}

    	$model=new User();
    	$model->name=$request->name;
    	$model->email=$request->email;
    	$model->password=bcrypt($request->password);
    	$model->save();

    	return response()->json(['status_code'=>200,'message'=>'Register successfully']);
    }

    public function login(Request $request)
    {
    	$validator=Validator::make($request->all(),[
    		'email' =>'required|email',
    		'password' =>'required'

    	]);

    	if($validator->fails()){
    		return response()->json(['status_code'=>400,'message'=>'Bad Request']);
    	}
    	$credentials=request(['email','password']);
    	if (!Auth::attempt($credentials)) {
    		return response()->json(['status_code'=>500,'message'=>'Unauthorized']);
    	}


    	$user=User::where('email',$request->email)->first();
    	$tokenResult=$user->createToken('authToken')->plainTextToken;
    	return response()->json(['status_code'=>200,'token'=>$tokenResult]);
    }

    public function logout(Request $request){
    	$request->user()->currentAccessToken()->delete();
    	return response()->json(['status_code'=>200,'message'=>'Token deleted successfully']);
    }
}
















