<?php

namespace App\Http\Controllers;

use App\Models\bookings;
use Illuminate\Http\Request;

class rentUserController extends Controller
{
    public function index()
    {
        $bookings=bookings::all();
        return view ('/Admin/bookingDetails',['bookings'=>$bookings]);
    }
   
}