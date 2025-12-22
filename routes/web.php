<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pedidos', function() {return view('app.pedidos');})->name('pedidos')->middleware('auth');

Route::get('/vendedores', function(){ return view('app.vendedores');})->name('vendedores')->middleware('auth');