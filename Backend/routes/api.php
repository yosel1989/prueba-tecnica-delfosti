<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/validate-token', \App\Http\Controllers\Api\Auth\PostValidateTokenController::class);


//Route::middleware('auth:sanctum')->group(function () {
    Route::post('/product', \App\Http\Controllers\Api\Product\PostCreateProductController::class);
    Route::put('/product', \App\Http\Controllers\Api\Product\PutUpdateProductController::class);
    Route::delete('/product/{id}', \App\Http\Controllers\Api\Product\DeleteProductController::class);
    Route::get('/products', \App\Http\Controllers\Api\Product\ListProductController::class);
//});


//Route::middleware('auth:sanctum')->group(function () {
    Route::post('/user', \App\Http\Controllers\Api\User\PostCreateUserController::class);
    Route::put('/user', \App\Http\Controllers\Api\User\PutUpdateUserController::class);
    Route::delete('/user/{id}', \App\Http\Controllers\Api\User\DeleteUserController::class);
    Route::get('/users', \App\Http\Controllers\Api\User\ListUserController::class);
    Route::put('/user/change-password', \App\Http\Controllers\Api\User\PutUpdateUserPasswordController::class);
//});


//Route::middleware('auth:sanctum')->group(function () {
    Route::post('/order', \App\Http\Controllers\Api\Order\PostCreateOrderController::class);
    Route::get('/orders', \App\Http\Controllers\Api\Order\ListOrderController::class);
    Route::put('/order/{id}/status-progress', \App\Http\Controllers\Api\Order\PutChangeStatusInProgressOrderController::class);
    Route::put('/order/{id}/status-delivery', \App\Http\Controllers\Api\Order\PutChangeStatusDeliveryOrderController::class);
    Route::put('/order/{id}/status-received', \App\Http\Controllers\Api\Order\PutChangeStatusReceivedOrderController::class);
//});



Route::post('/login', \App\Http\Controllers\Api\Auth\PostLoginController::class);





