<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CustomAuthMiddleware;
use App\Http\Middleware\CustomGuestMiddleware;



Route::name("admin.")->prefix("post")->middleware("custom-auth")->group(function(){
    Route::get("/",[PageController::class ,"homepage"])->name("home");
    Route::resource("/item",ItemController::class);
    Route::resource("/category",CategoryController::class);
});

   
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("custom-auth");


Route::prefix("custom")->
name("custom.")->
group(function(){
Route::post("/login",[AuthController ::class,"login"])->name("login")->middleware("custom-guest");
Route::post("/register",[AuthController ::class,"register"])->name("register")->middleware("custom-guest");
Route::post("/logout",[AuthController ::class,"logout"])->name("logout")->middleware("custom-auth");
});



Auth::routes();
