<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\busController;
use App\Http\Controllers\tripController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\scheduleController;
use App\Http\Controllers\seatplaneController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// group auth middleware for route
Route::post('storeBooking',[bookingController::class,'storeBooking']);


// insert bus route
Route::post('/insertBus', [busController::class, 'insertBus']);
// route for delete bus
Route::get('/deleteBus/{id}', [busController::class, 'deleteBus']);

// inser trip
Route::post('insertTrip',[tripController::class,'insertTrip']);
Route::get('deleteTrip/{id}',[tripController::class,'deleteTrip']);

// schedule
Route::post('schedule',[scheduleController::class,'store']);
Route::get('deleteSchedule/{id}',[scheduleController::class,'deleteSchedule']);

// store seat
Route::post('insertSeat',[seatplaneController::class,'storeSeat']);

// booking

