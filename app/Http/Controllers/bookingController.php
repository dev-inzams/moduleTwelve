<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Schedule;
use App\Models\SeatPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class bookingController extends Controller
{
    public function bookings(Request $request){
        // get all schedule
        $schedule = Schedule::with(['bus', 'trip'])->get();
        // get total seat
        $total_seat = SeatPlan::all();
        // get my booking
        $user_id = Auth::id();
        $bookings = Booking::where('user_id', $user_id)->with(['schedule','trip'])->get();
        return view('dashboard.booking',[
            'schedules' => $schedule,
            'seats' => $total_seat,
            'bookings' => $bookings
        ]);
    }

    // store booking
    public function storeBooking(Request $request){
        // get user id
        $user_id = $request->input('user_id');
        if($user_id == null){
            return redirect(route('login'));
        }
        $schedule_id= $request->input('schedule_id');
        $seat_number = $request->input('seat_number');
        $amount_paid = $request->input('amount_paid');

        $insertBooking = Booking::create([
            'user_id' => $user_id,
            'schedule_id' => $schedule_id,
            'seat_number' => $seat_number,
            'amount_paid' => $amount_paid
        ]);

        if($insertBooking){
            $seatPlan = SeatPlan::where('total_seats', $seat_number)
            ->update([
                'booking_status' => '1',
                'booking_time' => Carbon::now(),
            ]);
            if($seatPlan){
                return redirect()->back();
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }


    // userdashboardBooking
    public function usersbookings(Request $request){
        // get all schedule
        $schedule = Schedule::with(['bus', 'trip'])->get();
        // get total seat
        $total_seat = SeatPlan::all();
        // get my booking
        $user_id = Auth::id();
        $bookings = Booking::where('user_id', $user_id)->with(['schedule','trip'])->get();
        return view('booking',[
            'schedules' => $schedule,
            'seats' => $total_seat,
            'bookings' => $bookings
        ]);
    }
}
