<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userDashController extends Controller
{
    public function index()
    {
        $user=Auth::user()->id;
        $user=Auth::user()->name;
        return view ('/Home/userDashboard',compact('user'));
       
    }


    public function show()
    {
        // $user = Auth::user();
        // $cars = $user->cars;

        // logger($cars);

        $bookings = Auth::user()->bookings;
        // return view ('/Admin/bookingDetails',['bookings'=>$bookings]);

        return view('Home/userCars', compact('bookings'));
    }


}