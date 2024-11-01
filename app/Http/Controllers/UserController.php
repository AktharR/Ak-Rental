<?php

namespace App\Http\Controllers;

use App\Models\bookings;
use App\Models\cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $cars=cars::all();
        return view('index',['cars'=>$cars]);
    }

    public function create($id)
    {
        $cars=cars::find($id);
        return view('/Home/booking',['cars'=>$cars]);
    }

    public function store(Request $request, $id)
{
    // Validate incoming request
    $validatedData = $request->validate([
        'cus_name' => 'required',
        'mail'     => 'required|email',
        'phone'    => 'required|numeric',
        'nic'      => 'required|numeric',
        'date'     => 'required|date',
    ]);

    
    // Create new booking
    $booking = new Bookings;
    $booking->name = $validatedData['cus_name'];
    $booking->E_mail = $validatedData['mail'];
    $booking->phone = $validatedData['phone'];
    $booking->NIC = $validatedData['nic'];
    $booking->booking_date = $validatedData['date'];
    $booking->car_id = $id;  // Link to the car being booked
    $booking->user_id = Auth::user()->id;  // Link to the car being booked

    // Save booking to the database
    $booking->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Booking confirmed');
}

}