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

class AddonsController extends Controller
{
     public function __construct()
    {
        $this->middleware('web');
    }

    public function getServiceAddons()
    {
          $services = AddonService::all();
        return view('admin.settings.service_addons',compact('services'));
    }

        public function postNewAddOnService(Request $request)
    {
        try {
            // do your database transaction here
            $newService = new AddonService;
            $newService->addService = $request['addService'];
            $newService->cost= $request['cost'];
            $newService->save();
            return $newService;
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        } 
    }

    public function postEditAddOnService(Request $request)
    {
        try {
            // do your database transaction here
            $editService = AddonService::find($request['id']);
            $editService->addService = $request['addService'];
            $editService->cost= $request['cost'];
            $editService->save();
            return $editService;
        } catch (\Illuminate\Database\QueryException $e) {
            return $e;//"false";
            // something went wrong with the transaction, rollback
        }
     }
    
      
    public function postDelAddOnService(Request $request)
    {
        try {
            // do your database transaction here
            $delService = AddonService::find($request['id']);
            $delService->delete();
            return $delService;
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        }
     }


}
