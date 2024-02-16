<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your admin dashboard. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['verify'=>true]);
Route::prefix('admin')->middleware('verified')->group(function () {
    
    //dashboardHome
    Route::get('dashboardHome',[Controller::class,'dashboardHome'])->name('dashboardHome');

    //cars
    Route::get('addCar',[CarController::class,'addCar'])->name('addCar');
    Route::get('createCar',[CarController::class,'create'])->name('createCar');
    Route::post('storeCar',[CarController::class,'store'])->name('storeCar');
    Route::get('cars',[CarController::class,'index'])->name('cars');
    Route::get('editCar/{id}',[CarController::class,'edit'])->name('editCar');
    Route::put('updateCar/{id}',[CarController::class,'update'])->name('updateCar');
    Route::get('deleteCar/{id}',[CarController::class,'destroy'])->name('deleteCar');

    //categories
    Route::get('addCategory',[CategoryController::class,'addCategory'])->name('addCategory');
    Route::get('createCategory',[CategoryController::class,'create'])->name('createCategory');
    Route::post('storeCategory',[CategoryController::class,'store'])->name('storeCategory');
    Route::get('categories',[CategoryController::class,'index'])->name('categories');
    Route::get('editCategory/{id}',[CategoryController::class,'edit'])->name('editCategory');
    Route::put('updateCategory/{id}',[CategoryController::class,'update'])->name('updateCategory');
    Route::get('deleteCategory/{id}',[CategoryController::class,'destroy'])->name('deleteCategory');

    //testimonials
    Route::get('addTestimonial',[TestimonialController::class,'addTestimonial'])->name('addTestimonial');
    Route::get('createTestimonial',[TestimonialController::class,'create'])->name('createTestimonial');
    Route::post('storeTestimonial',[TestimonialController::class,'store'])->name('storeTestimonial');
    Route::get('testimonialsList',[TestimonialController::class,'index'])->name('testimonialsList');
    Route::get('editTestimonial/{id}',[TestimonialController::class,'edit'])->name('editTestimonial');
    Route::put('updateTestimonial/{id}',[TestimonialController::class,'update'])->name('updateTestimonial');
    Route::get('deleteTestimonial/{id}',[TestimonialController::class,'destroy'])->name('deleteTestimonial');

    //users
    Route::get('addUser',[UserController::class,'addUser'])->name('addUser');
    Route::get('createUser',[UserController::class,'create'])->name('createUser');
    Route::post('storeUser',[UserController::class,'store'])->name('storeUser');
    Route::get('users',[UserController::class,'index'])->name('users');
    Route::get('editUser/{id}',[UserController::class,'edit'])->name('editUser');
    Route::put('updateUser/{id}',[UserController::class,'update'])->name('updateUser');

    //messages
    Route::get('messages',[ContactController::class,'index'])->name('messages');
    Route::get('showMessage/{id}',[ContactController::class,'show'])->name('showMessage');
    Route::get('deleteMessage/{id}',[ContactController::class,'destroy'])->name('deleteMessage');
    Route::get('allAlerts',[ContactController::class,'allAlerts'])->name('allAlerts');
    Route::get('markAsRead/{id}',[ContactController::class,'markAsRead'])->name('markAsRead');

    

});