<?php

namespace App\Http\Controllers\Admin\Bookings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use Carbon\Carbon;
class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function getCalendar()
    {
      
        $bookings = Booking::all();
        
        return view('admin.bookings.calendar',compact('bookings'));
    } 

}
