<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\User\HomeController;

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

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/', [AdminController::class, 'dashboard']);

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

Route::get('admin/staff/payments/{id}', [StaffController::class, 'all_payments']);
Route::get('admin/staff/payment/{id}/add/', [StaffController::class, 'add_payment']);
Route::post('admin/staff/payment/{id}', [StaffController::class, 'save_payment']);
Route::get('admin/staff/payment/{id}/delete/', [StaffController::class, 'delete_payment']);

Route::resource('admin/booking', BookingController::class);
Route::get('admin/booking/{id}/delete/', [BookingController::class, 'destroy']);

Route::get('admin/booking/available-rooms/{checkin_date}', [BookingController::class, 'available_rooms']);

Route::get('user/', HomeController::class);