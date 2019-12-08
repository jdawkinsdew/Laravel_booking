<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('web');
    }

    public function dashboard()
    {

       $disp_week_data = [];
       $disp_week_revenue = [];
       $disp_notification_data = [];
       $week_data = [];
       $booking_week = 0;
       $booking_today = 0;
       $revenue_today = 0;
       $unread_today = 0;
       
       $today =Carbon::now();
       $str_today = $today->format('Y-m-d'); 
       $bookings = Booking::all();
       $date = Carbon::now();
       $week_start = $date->startOfWeek();
       $difference = $today->diff($week_start);
       $total_duration = $difference->d;
       $str_week_start = $week_start->format('Y-m-d');
       $data['week_start'] = $str_week_start;
       $week_end = $week_start->addWeek(1);
       $str_week_end = $week_end->format('Y-m-d');
       $week_start = Carbon::now()->startOfWeek();

       for($i = 0;$i<7; $i++)
        {
          $disp_week_data[$i]=0;
          $disp_week_revenue[$i] = 0;
          $disp_notification_data[$i] = 0;
          foreach($bookings as $booking)
            {   
              if(Carbon::parse($booking->date)->format('Y-m-d') == $str_week_start)
                {  
                  $disp_week_data[$i]++;
                 ;
                  if($booking->state != 'rejected' && $booking->state != 'Pending')
                   { 
                       $disp_week_revenue[$i] += (int)substr($booking->price,0,-1);
                    }
                    if($booking->state == 'Pending')
                    {
                         $disp_notification_data[$i]++;
                    }
                }        
            }
           
            if($str_week_start == $str_today)
            {
                $booking_today = $disp_week_data[$i];
                $revenue_today = $disp_week_revenue[$i];
                $unread_today = $disp_notification_data[$i];
            }
             
            $booking_week += $disp_week_data[$i];
            $week_start->addDay(1);         
            $str_week_start = $week_start->format('Y-m-d'); 
        }       
       $rate_today = ($total_duration*100 * $booking_today)/$booking_week; 
 
       $data['today'] = $today->format('Y-m-d');      
       $data['week_end'] = $str_week_end;
       $data['booking_today'] = $booking_today;
       $data['booking_week'] = $booking_week;
       $data['rate_today'] = $rate_today;
       $data['revenue_today'] = $revenue_today;
       $data['unread_today'] = $unread_today;
       
      return view('admin.layouts.main',compact('data'));   
    }
}
