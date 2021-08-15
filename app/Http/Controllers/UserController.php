<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Phone;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
     function index(Request $request)
    {
       
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }

    	public function insertRecord()
    	{
    		$phone=new Phone();
    		$phone->phone="123456";

    		$user=new User();
    		$user->name="user";
    		$user->email="user@gmail.com";
    		$user->password=encrypt("user");
    		$user->save();
    		$user->phone()->save($phone);
    		return "Record savwe";
    	}
    	public function fectPhoneByUser($id)
    	{
    		$phone=User::find($id)->phone;
    		return $phone;
    	}

         function join(Request $request)
    {
        $user=DB::table('users')->join('phones','users.id','=','phones.user_id')->get();
        print_r($user);
}

        function leftjoin(Request $request)
    {
        $user=DB::table('users')->leftjoin('phones','users.id','=','phones.user_id')->get();
        print_r($user);
}

        function rightjoin(Request $request)
    {
        $user=DB::table('users')->rightjoin('phones','users.id','=','phones.user_id')->get();
        print_r($user);
}

        function crossjoin(Request $request)
    {
        $user=DB::table('users')->crossjoin('phones','users.id')->get();
        print_r($user);
}
}
