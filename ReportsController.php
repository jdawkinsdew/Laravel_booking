<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function getBookings()
    {
      $currentYear = Carbon::now()->year;
     
      $date =Carbon::now();
      $currentYear = $date->year;
      $currentMonthName = Carbon::now()->format('F');  
      $disp_month_data = [];
      $disp_year_month = [];
      $disp_week_data = [];
      $week_data = [];
      $month_data = [];
      $year_month = [];
      $countWeek = [];
    
      $date = Carbon::now();
      $week_start = $date->startOfWeek();
      $str_week_start = $week_start->format('Y-m-d');
      $date = Carbon::now();
     
      $lastday = $date->lastOfMonth()->format('d');
      $month_start = $date->firstOfMonth();
      $str_month_start = $month_start->format('Y-m-d');
      $bookings = Booking::all();
      $date = Carbon::now();
      $year_start = $date->startOfYear();
      $str_year_month = $year_start->format('Y-m-d');
        
      for($i = 0;$i<7; $i++)
        {
          $disp_week_data[$i]=0;

          foreach($bookings as $booking)
            {
              if(Carbon::parse($booking->start)->format('Y-m-d') == $str_week_start)
                {
                  $disp_week_data[$i]++;
                }         
            }
                $week_start->addDay(1);
                array_push($week_data,$str_week_start);
                $str_week_start = $week_start->format('Y-m-d');          
        }              
        
        for($j=0;$j<$lastday;$j++)
        {
            $disp_month_data[$j]=0;
          foreach($bookings as $booking)
          {
            if(Carbon::parse($booking->start)->format('Y-m-d') == $str_month_start)
            {
               $disp_month_data[$j]++;
            }         
          }
            $month_start->addDay(1);
            array_push($month_data,$str_month_start);
            $str_month_start = $month_start->format('Y-m-d');
        }
         
        
        for($k=0;$k<12;$k++)
          {
              $disp_year_month[$k] = 0;
              $lastday = $year_start->lastOfMonth()->format('d');
              $month_start = $year_start->firstOfMonth();
              $str_year_month = $month_start->format('Y-m-d');
            for($u=0;$u<$lastday;$u++)
            {
              foreach($bookings as $booking)
              {
                if(Carbon::parse($booking->start)->format('Y-m-d') == $str_year_month)
                {
                  $disp_year_month[$k]++;
                }         
              }               
                $year_start->addDay(1);                    
                $str_year_month = $year_start->format('Y-m-d');            
              } 
                $year_start->addDay(-1);                
                array_push($year_month,$year_start->format('F')); 
                $year_start->addDay(1);   
          }
             
         return view('admin.reports.bookings',compact('disp_year_month','disp_week_data','disp_month_data','year_month','week_data','month_data','currentMonthName','currentYear'));
    }


    public function getNextPrveBookings()
    {
        
         return "hello";//$data;
    }

     public function getPerformedServices()
    {
          $bookings = Booking::all();
          $countMonth=array();
          $countMonth_day=array();
          $currentMonth = 8;
          $currentYear = 2018;
          $currentMonthName = date('M',strtotime('2018-08-27'));
          $currentDay = 27;
          $countWeek=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
          $countDay=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
          
          for($i=0;$i<12;$i++){
              foreach($bookings as $booking){
                $d=cal_days_in_month(CAL_GREGORIAN,($i+1),(int)date('y',strtotime($booking->start)));
              
                if(date('m',strtotime($booking->start))==($i+1)){
                  for($j=0;$j<$d;$j++){
                    if(date('d',strtotime($booking->start))==($j+1) && $booking->status == "approved"){
                      $countDay[$j]++;
                       $k=date('W',strtotime($booking->start));
                       $countWeek[$k]++;
                    }                  
                  }
                }
                          
              }
              array_push($countMonth_day,$countDay);
            }
         for($i=0;$i<12;$i++){
          array_push($countMonth,array_sum($countMonth_day[$i]));
        }
      
        return view('admin.reports.perfomed_services',compact('countMonth_day','countMonth','countWeek','currentMonth','currentYear','currentDay','currentMonthName'));
    }
      public function getRevenue()
    {
          $bookings = Booking::all();
          $countMonth=array();
          $countMonth_day=array();
          $currentMonth = 8;
          $currentYear = 2018;
          $currentMonthName = date('M',strtotime('2018-08-27'));
          $currentDay = 27;
          $countWeek=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
          $countDay=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
          
          for($i=0;$i<12;$i++){
            $countDay=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
              foreach($bookings as $booking){
                $d=cal_days_in_month(CAL_GREGORIAN,($i+1),(int)date('y',strtotime($booking->start)));
              
                if(date('m',strtotime($booking->start))==($i+1)){
                  for($j=0;$j<$d;$j++){
                    if(date('d',strtotime($booking->start))==($j+1)){
                      $countDay[$j] += (int)substr($booking->price,0,-1);
                       $k=date('W',strtotime($booking->start));
                       $countWeek[$k]+= (int)substr($booking->price,0,-1);
                    }                  
                  }
                }
                          
              }
              array_push($countMonth_day,$countDay);
            }
         for($i=0;$i<12;$i++){
          array_push($countMonth,array_sum($countMonth_day[$i]));
        }
        return view('admin.reports.revenue',compact('countMonth_day','countMonth','countWeek','currentMonth','currentYear','currentDay','currentMonthName'));
     }
    public function getCapacityUtil()
    {
          $bookings    = Booking::all();
        return view('admin.reports.capacity_util',compact('bookings'));
    }
      public function getNewUniqueCustomer()
    {
         $bookings    = Booking::all();
        return view('admin.reports.newuni_customers',compact('bookings'));
    }
}
