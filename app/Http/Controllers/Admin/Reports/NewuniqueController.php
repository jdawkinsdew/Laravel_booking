<?php

namespace App\Http\Controllers\Admin\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use Carbon\Carbon;
class NewuniqueController extends Controller
{
      public function __construct()
    {
        $this->middleware('web');
    }
    public function getNewUniqueCustomer()
    {
         $bookings    = Booking::all();
        return view('admin.reports.newuni_customers',compact('bookings'));
    }
}
