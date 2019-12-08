<?php

namespace App\Http\Controllers\Admin\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use Carbon\Carbon;
class BookingController extends Controller
{
   public function __construct()
    {
        $this->middleware('web');
    }
    

    function change1Date($flag,$date)
    {
      if($flag == 0){
       $date->addMonth(-1);
      }else if($flag == 1)
      {
       $date->addWeek(-1);
      }else if($flag == 2)
      {
        $date->addYear(-1);
      }
    }


    function changeDate($flag,$date)
    {
      if($flag == 0){
       $date->addMonth(1);
      }else if($flag == 1)
      {
       $date->addWeek(1);
      }else if($flag == 2)
      {
        $date->addYear(1);
      }
    }
    public function getBookings()
    {
      $currentYear = Carbon::now()->year;
      $date =Carbon::now();
      $currentYear = $date->year;
      $currentMonthName = Carbon::now()->format('F');  
      $currentTime =Carbon::now()->format('Y-m-d');
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
              if(Carbon::parse($booking->date)->format('Y-m-d') == $str_week_start)
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
            if(Carbon::parse($booking->date)->format('Y-m-d') == $str_month_start)
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
                if(Carbon::parse($booking->date)->format('Y-m-d') == $str_year_month)
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
             
         return view('admin.reports.bookings',compact('disp_year_month','disp_week_data','disp_month_data','year_month','week_data','month_data','currentMonthName','currentYear','currentTime'));
    }
    
    public function getPreveBookings(Request $request)
    {
      $disp_month_data = [];
      $disp_year_month = [];
      $disp_week_data = [];
      $week_data = [];
      $month_data = [];
      $year_month = [];
      $countWeek = [];
     

      $flag = $request['flag']; 
     
      $current_time = $request['current_time'];
      //$date = Carbon::now();
      $date = Carbon::parse($current_time);
      $this->change1Date($flag,$date);
      $currentYear = $date->year;
     
      $date = Carbon::parse($current_time);
      $this->change1Date($flag,$date);
      $currentMonthName =$date->format('F');
      
    
      $date = Carbon::parse($current_time);
      $this->change1Date($flag,$date);
      $week_start = $date->startOfWeek();
      $str_week_start = $week_start->format('Y-m-d');
      $date = Carbon::parse($current_time);
      $this->change1Date($flag,$date);
      $lastday = $date->lastOfMonth()->format('d');
      $month_start = $date->firstOfMonth();
      $str_month_start = $month_start->format('Y-m-d');
      $bookings = Booking::all();
      $date = Carbon::parse($current_time);
      $this->change1Date($flag,$date);
      $year_start = $date->startOfYear();
      $str_year_month = $year_start->format('Y-m-d');
        
      for($i = 0;$i<7; $i++)
        {
          $disp_week_data[$i]=0;

          foreach($bookings as $booking)
            {
              if(Carbon::parse($booking->date)->format('Y-m-d') == $str_week_start)
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
            if(Carbon::parse($booking->date)->format('Y-m-d') == $str_month_start)
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
                if(Carbon::parse($booking->date)->format('Y-m-d') == $str_year_month)
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
          $data['disp_year_month'] = $disp_year_month;
          $data['year_month'] = $year_month;
          $data['disp_month_data'] = $disp_month_data;
          $data['month_data'] = $month_data;
          $data['disp_week_data'] = $disp_week_data;
          $data['week_data'] = $week_data;
          $data['flag'] = $flag;
          $data['currentYear'] = $currentYear;
          $data['currentMonthName'] = $currentMonthName;
          $date = Carbon::parse($current_time);
          $this->change1Date($flag,$date);
          $data['current_time'] = $date->format('Y-m-d');
      return $data;       
    }




    public function getNextBookings(Request $request)
    {
      $disp_month_data = [];
      $disp_year_month = [];
      $disp_week_data = [];
      $week_data = [];
      $month_data = [];
      $year_month = [];
      $countWeek = [];
     

      $flag = $request['flag']; 
     
      $current_time = $request['current_time'];
      //$date = Carbon::now();
      $date = Carbon::parse($current_time);
      $this->changeDate($flag,$date);
      $currentYear = $date->year;
     
      $date = Carbon::parse($current_time);
      $this->changeDate($flag,$date);
      $currentMonthName =$date->format('F');
      
    
      $date = Carbon::parse($current_time);
      $this->changeDate($flag,$date);
      $week_start = $date->startOfWeek();
      $str_week_start = $week_start->format('Y-m-d');
      $date = Carbon::parse($current_time);
      $this->changeDate($flag,$date);
      $lastday = $date->lastOfMonth()->format('d');
      $month_start = $date->firstOfMonth();
      $str_month_start = $month_start->format('Y-m-d');
      $bookings = Booking::all();
      $date = Carbon::parse($current_time);
      $this->changeDate($flag,$date);
      $year_start = $date->startOfYear();
      $str_year_month = $year_start->format('Y-m-d');
        
      for($i = 0;$i<7; $i++)
        {
          $disp_week_data[$i]=0;

          foreach($bookings as $booking)
            {
              if(Carbon::parse($booking->date)->format('Y-m-d') == $str_week_start)
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
            if(Carbon::parse($booking->date)->format('Y-m-d') == $str_month_start)
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
                if(Carbon::parse($booking->date)->format('Y-m-d') == $str_year_month)
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
          $data['disp_year_month'] = $disp_year_month;
          $data['year_month'] = $year_month;
          $data['disp_month_data'] = $disp_month_data;
          $data['month_data'] = $month_data;
          $data['disp_week_data'] = $disp_week_data;
          $data['week_data'] = $week_data;
          $data['flag'] = $flag;
          $data['currentYear'] = $currentYear;
          $data['currentMonthName'] = $currentMonthName;
          $date = Carbon::parse($current_time);
          $this->changeDate($flag,$date);
          $data['current_time'] = $date->format('Y-m-d');
      return $data;       
    }

}
