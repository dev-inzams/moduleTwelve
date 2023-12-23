<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class busController extends Controller {
    // insert bus in Bus model

    public function insertBus( Request $request ) {
        $bus = Bus::create( [
            'name'                => $request->input( 'name' ),
            'registration_number' => $request->input( 'registration_number' ),
        ] );

        if ( $bus ) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }

    }
     // get all bus from Bus model
     public function getBus() {
        $getBus = Bus::all();
        return view( 'dashboard.addBus',['buses' => $getBus] );
     }

    //  delete bus
    public function deleteBus($id) {
        $deleteBus = Bus::where( 'id', $id )->delete();
        if ( $deleteBus ) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    // get all buses
    public function buses() {
        $buses = Bus::all();
        return view( 'userdashboard.buses', ['buses' => $buses] );
    }


}
