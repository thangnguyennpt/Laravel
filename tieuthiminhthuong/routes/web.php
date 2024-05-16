<?php

//
use App\Http\Controllers\UserController;

//nguoi dung  
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\ContactController;

//
use Illuminate\Support\Facades\Route;
//nguoi dung
Route::get("/",[HomeController::class,"index"])->name('site.home');
Route::get("san-pham",[ProductController::class,"index"])->name('site.product');
Route::get("chi-tiet-san-pham/{slug}",[ProductController::class,"index"])->name('site.product.detail');
Route::get("lien-he",[ContactController::class,"index"])->name('site.contact');


//
Route::get("welcome", function () {
    return view('welcome');
});

Route::get("home", function(){ return "Home"; });
Route::get("user",[UserController::class,"index"]);
Route::get("user/1",[UserController::class,"show"]); 
Route::get("user/{id}/edit",[UserController::class,"edit"])->name("user.edit");
Route::get("user/list/{page?}",[UserController::class,"list"])->name("user.list");


//quan tri

// <a href="{{route('site.home')}}">home</a>