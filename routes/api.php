<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('admin', 'App\Http\Controllers\AdminUserController');
Route::apiResource('seller', 'App\Http\Controllers\SellerController');
Route::apiResource('sale', 'App\Http\Controllers\SaleController');