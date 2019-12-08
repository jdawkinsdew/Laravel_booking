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
class ServiceproviderController extends Controller
{
      public function __construct()
    {
        $this->middleware('web');
    }
    
    
        public function getServicesProviders(Request $request)
    {        
        try {
        $id = $request->id;
        $provider = Provider::find($id);
        $allservices = Service::all();
        $areas = Managed_Area::all();
        $avail_services = $provider->services;
        $block_days = $provider->block_days;
        return view('admin.settings.service_providers',compact('provider','allservices','areas','id','avail_services'));
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        }
    }
    
   public function postAvailableNewService(Request $request)
    {
       
    }

    public function postAvailableEditService(Request $request)
    {
         try {
            // do your database transaction here
            $id = $request['id'];
            $allservices = $request['allservices'];
            $allareas = $request['allareas'];
            $provider = Provider::find($id);
            $provider->services()->sync($allservices);
            $provider->areas()->sync($allareas);
             return "true";
              
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
          } 
     }
    
      
    public function postAvailableDelServices(Request $request)
    {
        try {
            // do your database transaction here
            $delServiceData = Availableservice::find($request['id']);
            $delServiceData->delete();
            return $delServiceData;
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        } catch (\Exception $e) {
            // something went wrong elsewhere, handle gracefully
            return "false";
        }
     }
     public function postNewBlock(Request $request)
    {
        try {
            // do your database transaction here
            $newBlockdaysData = new Blockdays();
            $newBlockdaysData->provider_id = $request['id'];
            $newBlockdaysData->date = $request['date'];
            $newBlockdaysData->reason = $request['reason'];
            $newBlockdaysData->save();       
            return $newBlockdaysData;
        } catch (\Illuminate\Database\QueryException $e) {
            return $e;
            // something went wrong with the transaction, rollback
        } 
    }

    public function postEditBlock(Request $request)
    {
        try {
            $editBlockdaysData = Blockdays::find($request['id']);
            $editBlockdaysData->date = $request['date'];
            $editBlockdaysData->reason = $request['reason'];
            $editBlockdaysData->save();
            return $editBlockdaysData;
        } catch (\Illuminate\Database\QueryException $e) {
            return $e;
            // something went wrong with the transaction, rollback
        }
     }
    
      
    public function postDelBlock(Request $request)
    {
            
        try {
            // do your database transaction here
            $delBlockdaysData = Blockdays::find($request['id']);
            $delBlockdaysData->delete();
            return $delBlockdaysData;
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        } catch (\Exception $e) {
            // something went wrong elsewhere, handle gracefully
            return "false";
        }
     }
       

          
   public function postNewManagedAreas(Request $request)
    {
        try {
            // do your database transaction here
            $newManagedArea = new Managed_Area();
            $newManagedArea->name = $request['name'];
            $newManagedArea->zip_code = $request['zip_code'];
            $newManagedArea->color = $request['color'];
            $newManagedArea->save();
            return $newManagedArea;
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        } 
    }

    public function postEditManagedAreas(Request $request)
    {
        try {
            // do your database transaction here
            $editManagedArea = Managed_Area::find($request['id']);
            $editManagedArea->name = $request['name'];
            $editManagedArea->zip_code= $request['zip_code'];
            $editManagedArea->color= $request['color'];
            $editManagedArea->save();
            return $editManagedArea;
        } catch (\Illuminate\Database\QueryException $e) {
            return $e;//"false";
            // something went wrong with the transaction, rollback
        }
     }
    
      
    public function postDelManagedAreas(Request $request)
    {
        try {
            // do your database transaction here
            $delManagedArea = Managed_Area::find($request['id']);
            $delManagedArea->delete();
            return $delManagedArea;
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        }
     }

     
}
