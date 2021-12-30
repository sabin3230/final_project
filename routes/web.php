<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/bookingvehicle', [App\Http\Controllers\VehicleBookingController::class,'index']);

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard',[App\Http\Controllers\AdminController::class,'index'])->name('dash');
    Route::resource('role', App\Http\Controllers\RoleController::class);
    Route::resource('permission', App\Http\Controllers\PermissionController::class);
    Route::resource('p_component', App\Http\Controllers\PermissionComponentController::class);
   
   


    Route::resource('org', App\Http\Controllers\OrganizationController::class);
    Route::resource('vehicle-model', App\Http\Controllers\VehicleModelController::class);
    Route::resource('branch', App\Http\Controllers\BranchController::class);
    Route::resource('department', App\Http\Controllers\DepartmentController::class);
    Route::resource('employee', App\Http\Controllers\EmployeeController::class);
    Route::resource('customer', App\Http\Controllers\CustomerController::class);
    Route::resource('issue', App\Http\Controllers\IssueController::class);
    Route::resource('booking', App\Http\Controllers\BookingController::class);  



    Route::resource('servicing', App\Http\Controllers\ServicingController::class);  
    Route::post('servicing/assign/{id}',[App\Http\Controllers\ServicingController::class,'assignEmployee'])->name('servicing.assign');
    Route::post('servicing/start/{id}',[App\Http\Controllers\ServicingController::class,'getStartTask'])->name('servicing.start');
    Route::post('servicing/end/{id}',[App\Http\Controllers\ServicingController::class,'completeService'])->name('servicing.complete');
    Route::post('servicing/issue/{id}',[App\Http\Controllers\ServicingController::class,'checkIssue'])->name('servicing.issue');
    Route::post('servicing/issue/remarks/{id}',[App\Http\Controllers\ServicingController::class,'servicingRemarks'])->name('servicing.remarks');

    



});


Route::group(['prefix' => 'customer','middleware' => 'auth'], function () {
    Route::resource('customer-vehicle', App\Http\Controllers\CustomerVehicleController::class);
    Route::resource('booking', App\Http\Controllers\BookingController::class);  
    Route::get('/dashboard',[App\Http\Controllers\CustomerController::class,'customerDashboard'])->name('customer-dashboard');
    Route::get('/profile',[App\Http\Controllers\CustomerController::class,'customerProfile'])->name('profile');
});

// Auth::routes();


