<?php

use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\busController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\tripController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\scheduleController;
use App\Http\Controllers\seatplaneController;

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

Route::get('/', [homeController::class, 'index'])->name('home');


Route::get('/dashboard', [roleController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/add-buses', [busController::class, 'getBus'])->name('add-buses');
Route::get('/add-trip', [tripController::class, 'getAllTrips'])->name('add-trip');
Route::get('/schedule', [scheduleController::class, 'schedule'])->name('schedule');
Route::get('/seatplane', [seatplaneController::class, 'seatplane'])->name('seatplane');
Route::get('/booking', [bookingController::class, 'bookings'])->name('booking');

// user booking
Route::get('/usersbookings', [bookingController::class, 'usersbookings'])->name('usersbookings');

Route::get('/buses', [busController::class, 'buses'])->name('buses');
Route::get('/trips', [tripController::class, 'trips'])->name('trips');
Route::get('/schedules', [scheduleController::class, 'schedules'])->name('schedules');




require __DIR__.'/auth.php';
