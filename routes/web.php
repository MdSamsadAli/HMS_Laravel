<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;

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

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('admin/roomtype', RoomTypeController::class);
Route::get('admin/roomtype/{id}/delete/', [RoomTypeController::class, 'destroy']);

Route::resource('admin/rooms', RoomController::class);
Route::get('admin/room/{id}/delete/', [RoomController::class, 'destroy']);

Route::resource('admin/customer', CustomerController::class);
Route::get('admin/customer/{id}/delete/', [CustomerController::class, 'destroy']);

// Route::get('roomtype/index', [RoomTypeController::class, 'index'])->name('roomtype/index');
// Route::get('roomtype/create', [RoomTypeController::class, 'create'])->name('roomtype/create');
// Route::post('roomtype/store', [RoomTypeController::class, 'store'])->name('roomtype/store');
// Route::get('roomtype/edit', [RoomTypeController::class, 'edit'])->name('roomtype/edit');
// Route::post('roomtype/update', [RoomTypeController::class, 'update'])->name('roomtype/update');