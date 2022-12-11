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
Route::post('user/login' , [\App\Http\Controllers\Api\Auth\UserAuthController::class , 'login']);
Route::post('customer/login' , [\App\Http\Controllers\Api\Auth\CustomerAuthController::class , 'login']);

Route::prefix('user')->middleware('auth:dir')->group(function () {
    Route::get('show-info' , [\App\Http\Controllers\Api\Auth\UserAuthController::class , 'showInfo']);
});

Route::prefix('customer')->middleware('auth:api')->group(function () {
    Route::get('show-info' , [\App\Http\Controllers\Api\Auth\CustomerAuthController::class , 'showInfo']);
});

