<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\UserController;
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

Route::group(["prefix"=> "/admin"], function () {
    
    Route::get('/home',[HomeController::class,'index'])->name('admin.home');
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/authenticate',[AuthController::class,'authenticate'])->name('authenticate');

    Route::group(['middleware'=>['auth','checkPermission']], function () {

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

            Route::post('/assign/role-permissions/{roleId}','rolePermission')->name('role.permission');

        });
        Route::controller(UserController::class)->group(function () {
            Route::get('/users/index','index')->name('user.index');
            Route::get('/users/create','create')->name('user.create');
            Route::post('/users/store','store')->name('user.store');
            
        });
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/categories/index','index')->name('category.index');
            Route::get('/categories/create','create')->name('category.create');
            Route::post('/categories/store','store')->name('category.store');
            Route::get('/categories/edit/{categoryId}','edit')->name('category.edit');
            Route::post('/categories/update/{categoryId}','update')->name('category.update');
            Route::get('/categories/destroy/{categoryId}','destroy')->name('category.destroy');
        });
        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('/sub-categories/index','index')->name('subCategory.index');
            Route::get('/sub-categories/create','create')->name('subCategory.create');
            Route::post('/sub-categories/store','store')->name('subCategory.store');
            Route::get('/sub-categories/edit/{subCategoryId}','edit')->name('subCategory.edit');
            Route::post('/sub-categories/update/{subCategoryId}','update')->name('subCategory.update');
            Route::get('/sub-categories/destroy/{subCategoryId}','destroy')->name('subCategory.destroy');
        });
    });

});

