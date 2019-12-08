<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use Carbon\Carbon;
use App\Service;
use App\AddonService;
use App\Provider;
use App\Availableservice;
use App\Blockdays;
use App\Workingarea;
use App\Managed_Area;
use App\User;
use Log;
class ServicesController extends Controller
{
      public function __construct()
    {
        $this->middleware('web');
    }

      public function getServices()
    {
        $services = Service::all();
        return view('admin.settings.services',compact('services'));
    }

    
   public function postNewService(Request $request)
    {
        try {
            // do your database transaction here
            $newService = new Service;
            $newService->name = $request['name'];
            $newService->one_time = $request['one_time'];
            $newService->recurring = $request['recurring'];
            $newService->save();
            return $newService;
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        } 
    }

    public function postEditService(Request $request)
    {
        try {
            // do your database transaction here
            $editService = Service::find($request['id']);
            $editService->name = $request['name'];
            $editService->one_time= $request['one_time'];
            $editService->recurring= $request['recurring'];
            $editService->save();
            return $editService;
        } catch (\Illuminate\Database\QueryException $e) {
            return $e;//"false";
            // something went wrong with the transaction, rollback
        }
     }
    
      
    public function postDelService(Request $request)
    {
        try {
            // do your database transaction here
            $delService = Service::find($request['id']);
            $delService->delete();
            return $delService;
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        }
     }
}
