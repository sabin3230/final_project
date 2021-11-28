<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [App\Http\Controllers\HomeController::class,'index']);
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard',[App\Http\Controllers\AdminController::class,'index'])->name('dash');
    Route::resource('role', App\Http\Controllers\RoleController::class);
    Route::resource('permission', App\Http\Controllers\PermissionController::class);
    Route::resource('p_component', App\Http\Controllers\PermissionComponentController::class);
   
   

    // dd();
    Route::resource('org', App\Http\Controllers\OrganizationController::class);
    Route::resource('vehicle-model', App\Http\Controllers\VehicleModelController::class);


});


// Auth::routes();


