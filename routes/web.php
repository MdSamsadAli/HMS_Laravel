<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StaffController;

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

Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'check_login']);
Route::get('admin/logout', [AdminController::class, 'logout']);

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('admin/roomtype', RoomTypeController::class);
Route::get('admin/roomtype/{id}/delete/', [RoomTypeController::class, 'destroy']);

Route::resource('admin/rooms', RoomController::class);
Route::get('admin/room/{id}/delete/', [RoomController::class, 'destroy']);

Route::resource('admin/customer', CustomerController::class);
Route::get('admin/customer/{id}/delete/', [CustomerController::class, 'destroy']);


Route::get('admin/roomtypeimage/delete/{id}', [CustomerController::class, 'destroy_image']);

Route::resource('admin/department', DepartmentController::class);
Route::get('admin/department/{id}/delete/', [DepartmentController::class, 'destroy']);

Route::resource('admin/staff', StaffController::class);
Route::get('admin/staff/{id}/delete/', [StaffController::class, 'destroy']);
