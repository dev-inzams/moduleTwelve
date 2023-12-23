<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Schedule;
use App\Models\SeatPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{

    public function index()
    {
        $schedule = Schedule::with(['bus', 'trip'])->get();
        // get total seat
        $total_seat = SeatPlan::all();
        // get my booking
        $user_id = Auth::id();
        $bookings = Booking::where('user_id', $user_id)->with(['schedule','trip'])->get();

        return view('index',[
            'schedules' => $schedule,
            'seats' => $total_seat,
            'bookings' => $bookings
        ]);
    }
}
