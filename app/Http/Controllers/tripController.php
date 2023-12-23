<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class tripController extends Controller
{
    public function insertTrip(Request $request) {
        $inserTrips = Trip::create([
            'name' => $request->input('name'),
        ]);
        if($inserTrips) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function getAllTrips() {
        $getTrips = Trip::all();
        return view('dashboard.trip', ['trips' => $getTrips]);
    }

    // delete trip
    public function deleteTrip($id) {
        $trip = Trip::find($id);
        if($trip) {
            $trip->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    // get all trips
    public function trips() {
        $trips = Trip::all();
        return view('userdashboard.trips', ['trips' => $trips]);
    }
}
