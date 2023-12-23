<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class roleController extends Controller
{
    public function index(){
        if(Auth::id()){
            $userRole = Auth::user()->role;
            if($userRole == 'admin'){
                return view('dashboard.dashboard');
            }elseif($userRole == 'user'){
                return view('dashboard');
            }else{
                return view('index');
            }
        }
    }
}
