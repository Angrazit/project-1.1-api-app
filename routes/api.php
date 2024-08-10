<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;

Route::group(['middleware' => 'api'], function ($router) {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout']);
    Route::post('refresh', [LoginController::class, 'refresh']);
    Route::post('me', [LoginController::class, 'me']);

});

Route::group(['middleware' => 'auth:api'], function ($router) {
    Route::post('carts', [CartController::class, 'store']);
    // Route::get('carts', [CartController::class, 'index']);
    Route::put('carts/{id}', [CartController::class, 'update']);
    Route::delete('carts/{id}', [CartController::class, 'destroy']);
});

Route::get('carts', [CartController::class, 'index']);
