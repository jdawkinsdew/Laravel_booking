<?php

namespace App\Http\Controllers\Admin\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use Carbon\Carbon;
class CapacityutilController extends Controller
{
     public function __construct()
    {
        $this->middleware('web');
    }
        public function getCapacityUtil()
    {
          $bookings    = Booking::all();
        return view('admin.reports.capacity_util',compact('bookings'));
    }
}
