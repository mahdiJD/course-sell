<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/v1')->namespace('Api\V1')->group(function(){
    Route::post('send_sms', [AuthController::class,'sendSms']);
    Route::get('callbacke', [PaymentController::class,'callbacke'])->name('callbacke_api');
});
Route::prefix('/v1')->namespace('Api\V1')->middleware('auth:sanctum')->group(function(){
    Route::post('payment', [PaymentController::class,'payment'])->name('pay_api');
});
