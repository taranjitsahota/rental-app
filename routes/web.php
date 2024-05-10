<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Maincontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/dashboard',[Maincontroller::class,"dashboard"]);
Route::get('/login',[Authcontroller::class,"login"]);
Route::post('/loginpost',[Authcontroller::class,"loginpost"]);
Route::get('/show',[Maincontroller::class,"show"]);
Route::post('/store',[Maincontroller::class,"store"]);
Route::get('/delete/{id}', [Maincontroller::class, "destroy"]);

