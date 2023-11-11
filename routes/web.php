<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\RoleController;
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

        Route::controller(RoleController::class)->group(function () {
            Route::get('/roles/index','index')->name('role.index');
            Route::get('/roles/create','create')->name('role.create');
            Route::post('/roles/store','store')->name('role.store');
            Route::get('/roles/edit/{roleId}','edit')->name('role.edit');
            Route::post('/roles/update/{roleId}','update')->name('role.update');
            Route::get('/roles/destroy/{roleId}','destroy')->name('role.destroy');
            Route::get('/roles/assign/{roleId}','assign')->name('role.assign');

        });
    });

});

