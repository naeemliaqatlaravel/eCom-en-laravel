<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('add',[DeviceController::class,'add']);
Route::put('update',[DeviceController::class,'update']);
Route::delete('delete/{id}',[DeviceController::class,'delete']);
Route::get('search/{name}',[DeviceController::class,'search']);
Route::get('list',[DeviceController::class,'list']);
Route::post('upload',[FileController::class,'upload']);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']],function(){
Route::post('add',[DeviceController::class,'add']);
Route::put('update',[DeviceController::class,'update']);
Route::delete('delete/{id}',[DeviceController::class,'delete']);
Route::get('search/{name}',[DeviceController::class,'search']);
Route::get('list',[DeviceController::class,'list']);
Route::post('upload',[FileController::class,'upload']);

Route::post('/logout',[AuthController::class,'logout']);

});
//composer require laravel/sanctum 
//php artisan vender:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
//
//Route::post("login",[UserController::class,'index']);

//factory with resource api crud
Route::get('/pages',[PageController::class,'index']);
Route::post('/page',[PageController::class,'store']);
Route::get('/pages/{id}',[PageController::class,'show']);
Route::put('/pages/{id}',[PageController::class,'update']);
Route::delete('/pages/{id}',[PageController::class,'destroy']);




//register with api

Route::post('/register',[LoginController::class,'register']);
Route::post('/login',[LoginController::class,'login']);