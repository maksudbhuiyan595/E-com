<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\HomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('admin/home',[HomeController::class,'index'])->name('admin.home');
Route::group(["prefix"=> "/admin"], function () {

    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/authenticate',[AuthController::class,'authenticate'])->name('authenticate');
    
    Route::group(['middleware'=> 'auth'], function () {

        Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
        Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    });

});

