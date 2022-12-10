<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('login' , [\App\Http\Controllers\Api\Auth\AuthController::class , 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('user/show-info' , [\App\Http\Controllers\Api\Auth\AuthController::class , 'showInfo']);
    Route::get('todos' , function (){
        return  response()->json([
            'message' => 'success' ,
            'user' => auth()->user() ,
            'data' => auth()->user()->todos ,
        ]);
    });
});
