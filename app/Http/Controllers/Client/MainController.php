<?php
namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Provider;
use Illuminate\Http\Request;
use App\Service;
use App\Managed_Area;
use App\Blockdays;
use App\Booking;
use App\Availableservice;
use Carbon\Carbon;

class MainController extends Controller
{
     public function __construct()
    {
        $this->middleware('web');
    }
    public function index(){
        $allservices = Service::all();
        $areas = Managed_Area::all();
        $today = Carbon::now()->format('Y-m-d');
        $allBlockdays = Blockdays::all();
        $allBookings = Booking::all();
        $availableServices = Availableservice::all();
        return view('client.booking', compact('allservices', 'areas', 'today', 'allBlockdays', 'allBookings', 'availableServices'));
    }

    public function addBooking(Request $request){
        dd($request);
        $allservices = Service::all();
        $areas = Managed_Area::all();
        return view('client.booking', compact('allservices', 'areas'));
    }

    public function findProvider($date)
    {
      $free_providers = [];
      $all_providers = Provider::all();
       foreach($bookings as $booking)
              {
                if(Carbon::parse($booking->date)->format('Y-m-d') == $str_year_month)
                {
                  $disp_year_month[$k]++;
                }         
              }            
    }
    public function selectProvider(Request $request)
    {
        $serviceType = $request->serviceMethod;
        if($serviceType == 1)
        {
        $service = Service::find($request->serviceName);    
        $booking_date = $request->date;
        $booking_start_time = $request->timeFrom;
        $booking_finish_time = $request->timeTo;
        $booking_add_on = $request->serviceAddName;
        $booking_bulk = $request->bulk;
        $booking_address = $request->address;
        $booking_zipcode = $request->zipcode;

  
        }
      
 
        dd($request);
        return true;
    }
    public function selectAjax(Request $request)
    {
        try{
            $flag = true;
            $countNumber = 0;
            $maxNumber = 0;
            $date = $request->get('date');
            $thisDayBookings = Booking::all()->where('date', $date);
            $service_id = $request->get('service');
            $service = Service::find($service_id);
            foreach ($thisDayBookings as $dayBooking){
                    $providerId = $dayBooking->provider_id;
                    $availableProviders = Availableservice::all()->where('service_id', $service->id);
                    $maxNumber = $availableProviders->count();
                    foreach($availableProviders as $provider){
                        if($provider->provider_id != $providerId){
                            $providerInfo = Provider::find($provider->provider_id);
                            $bookings = $providerInfo->bookings()->where('date', $date)->get();
                            $test = $bookings->count();
                            if($bookings->count()){
                                $countNumber++;
                            }
                        }
                    }
            }
//            return response()->json(compact('m'));
            if( $countNumber/2+1 == $maxNumber){
                $flag = false;
            }
            if( $flag )
            {
                $status= 'true';
                $message = 'provider';
                return response()->json(compact('status', 'message'));
            } else {
                $status= 'false';
                $message = 'No provider';
                return response()->json(compact('status', 'message'));
            }
        }
        catch(\Exception $e){
            echo json_encode($e->getMessage());
        }
    }

}
