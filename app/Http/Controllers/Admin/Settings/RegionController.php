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
class RegionController extends Controller
{   public function __construct()
    {
        $this->middleware('web');
    }
     public function getAreas()
    {
        $managedareas = Managed_Area::all();
        return view('admin.settings.areas',compact('managedareas'));
    }

    
   public function postNewRegion(Request $request)
    {
        try {
            // do your database transaction here
            $newWorkingareasData = new Workingarea;
            $newWorkingareasData->provider_id = $request['provider_id'];
            $newWorkingareasData->name = $request['name'];
            $newWorkingareasData->zip_code = $request['zip_code'];
            $newWorkingareasData->save();
            return $newWorkingareasData;
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        } 
    }

    public function postEditRegion(Request $request)
    {
        try {
            // do your database transaction here
         
             $id = $request['id'];
             $data = $request['data'];
             $provider = Provider::find($id);
             $provider->areas()->sync($data);
             return $provider->areas;
              
        } catch (\Illuminate\Database\QueryException $e) {
            return $e;
          } 
     }
    
      
    public function postDelRegion(Request $request)
    {
            
        try {
            // do your database transaction here
            $delWorkingareasData = Workingarea::find($request['id']);
            $delWorkingareasData->delete();
            return $delWorkingareasData;
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        } catch (\Exception $e) {
            // something went wrong elsewhere, handle gracefully
            return "false";
        }
     }
    
}
