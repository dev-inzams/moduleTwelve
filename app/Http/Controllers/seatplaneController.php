<?php

namespace App\Http\Controllers;
use App\Models\Bus;
use App\Models\SeatPlan;
use Illuminate\Http\Request;

class seatplaneController extends Controller {
    public function seatplane() {
        $buses = Bus::all();
        $seats = SeatPlan::with('bus')->get();
        return view( 'dashboard.seatplane',[
            'buses' => $buses,
            'seats' => $seats
        ]);
    }

    // store seat
    public function storeSeat(Request $request){
        $bus_id = $request->input('bus_id');
        $total_seats = $request->input('total_seats');

        $insertSeat = SeatPlan::create([
            'bus_id' => $bus_id,
            'total_seats' => $total_seats
        ]);
        if($insertSeat){
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
}
