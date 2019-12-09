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
use Toastr;
use File;


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

    
   public function selectProvider(Request $request)
    {
        dd($request);
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
      
       $block_providers = Blockdays::where('date',$date)->provider();
     
        // dd($block_providers);
        return true;
    }

    public function saveBooking($id,$data)
    {
        if($data->get('serviceMethod')){
            $booking = new Booking();
            $booking->provider_id = $id;
            $booking->client_id = 1;
            $booking->service_id = $data['serviceName'];
            $booking->date = $data['date'];
            $booking->start_time = $data['timeFrom'];
            $booking->finish_time = $data['timeTo'];
            $booking->price = $data['serviceName'];
            $booking->status = "pending";
            $booking->duration = $data['date'];
            $booking->recurr_type = 1;
            $booking->save();
        }
        else{
            $booking = new Booking();
            $booking->provider_id = $id;
            $booking->client_id = 1;
            $booking->service_id = $data['serviceName'];
            $booking->date = Carbon::now()->format('Y-m-d');
            $booking->start_time = $data['timeFrom'];
            $booking->finish_time = $data['timeTo'];
            $booking->price = $data['serviceName'];
            $booking->status = "pending";
            $booking->duration = $data['range'];
            $booking->recurr_type = 0;
            $booking->save();
        }
        $allservices = Service::all();
        $areas = Managed_Area::all();
        $today = Carbon::now()->format('Y-m-d');
        $allBlockdays = Blockdays::all();
        $allBookings = Booking::all();
        $availableServices = Availableservice::all();
        return view('client.booking', compact('allservices', 'areas', 'today', 'allBlockdays', 'allBookings', 'availableServices'));
    }
    
    public function addBooking(Request $request){
        $flag = 0;
        $today = $request->get('date');
        // dd($request);
        if($request->serviceMethod)
        {
            $servID = $request->get('serviceName');
            $service = Service::find($servID);
            $avail_providers = $service->providers;
            foreach($avail_providers as $provider)
            {
                if(!$provider->block_days->where('date', $today)->count()){
                    if(!$provider->bookings->where('date', $today)->count()){
                        $this->saveBooking($provider['id'],$request);
                        return "success!";
                    }
                }                           
            }
            if(!$flag)
            {              
            Toastr::success('Your Order can be successful!');
            // return "TRUE";
            }else{
                Toastr::error("You can't receive this service this day!");
                // return "FALSE";
            }
        }else{
            $daterange = $request->get('range');
            $start_date = Carbon::parse(substr($daterange, 0, 10))->format('Y-m-d');
            $end_date = Carbon::parse(substr($daterange, 13, 23))->format('Y-m-d');
            $servID = $request->get('serviceName');
            $service = Service::find($servID);
            $avail_providers = $service->providers;
            $reccureType = $request->get('reccureType');
            foreach($avail_providers as $provider) {
                $from_date = $start_date;
                $availableCount = 0;
                $allCount = 0;
                do {
                    $date = Carbon::parse($from_date);
                    $date->addWeek($reccureType);
                    $date = Carbon::parse($date)->format('Y-m-d');
                    if($provider->block_days->where('date', $date)->count()==0 && $provider->bookings->where('date', $date)->count()==0){
                        $availableCount++;
                    }
                    $allCount++;
                    $from_date = $date;
                } while ($from_date <= $end_date);
                if($availableCount == $allCount)
                {
                    $this->saveBooking($provider['id'],$request);
                    break;
                }
            }
            return back();
        }        
    }

    public function checkProvider($servID,$today)
    {
        $service = Service::find($servID);
        $avail_providers = $service->providers;
        $data =  $avail_providers;
        foreach($avail_providers as $key => $provider) {
            if($provider->block_days->where('date', $today)->count()>0 || $provider->bookings->where('date', $today)->count()>0){
                array_splice($data,$key,1);
             }            
        }
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
