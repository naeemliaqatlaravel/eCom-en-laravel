<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $model=new Login();
        $model->name=$request->name;
        $model->email=$request->email;
        $model->password=Hash::make($request->password);
        $model->save();

        return response()->json(['status_code'=>200,'message'=>'Register successfully']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'email' =>'required|email',
            'password' =>'required'

        ]);

        if($validator->fails()){
            return response()->json(['status_code'=>400,'message'=>'Bad Request']);
        }
        

        $email=$request->email;
        $password=$request->password;
        $login=Login::where('email'=>$email);
                    return response()->json(['status_code'=>400,'message'=>'Bad Request']);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Login $login)
    {
        //
    }
}
