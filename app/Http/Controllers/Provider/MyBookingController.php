<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use Auth;

class MyBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function getBooking()
    {
        $id = Auth::user()->id;
        $myBookings = Booking::all()->where('provider_id', $id);
        // dd($myBookings);
        return view('provider.mybooking', compact('myBookings'));
    }

    public function detail()
    {
        $id = Auth::user()->id;
        $bookings = Booking::all()->where('provider_id', $id);

        return view('provider.detail', compact('bookings'));
    }
}
