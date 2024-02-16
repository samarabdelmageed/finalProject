<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactController;
use App\Mail\ContactMail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[Controller::class,'home'])->name('publicHome');
Route::fallback(Controller::class);
Route::get('home',[Controller::class,'home'])->name('home');
Route::get('listing',[Controller::class,'listing'])->name('listing');
Route::get('about',[Controller::class,'about'])->name('about');
Route::get('blog',[Controller::class,'blog'])->name('blog');
Route::get('contact',[Controller::class,'contact'])->name('contact');
Route::get('testimonials',[Controller::class,'testimonials'])->name('testimonials');
Route::post('sendContact',[Controller::class,'sendContact'])->name('sendContact');
Route::get('singlePost/{id}',[CarController::class,'show'])->name('showCar');