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
class ProviderController extends Controller
{
   public function __construct()
    {
        $this->middleware('web');
    }
     public function getProviders()
    {
        $providers = [];
        $users = User::all();
         foreach($users as $user)
         {
            if($user->role_id == 5)
                {
                  array_push($providers,$user);
            } 
         }
        return view('admin.settings.providers',compact('providers'));
    }


   public function postNewProvider(Request $request)
    {
        try {
            // do your database transaction here
            $newProvider = new Provider;
            $newProvider->name = $request['name'];
            $newProvider->email = $request['email'];
            $newProvider->phone = $request['phone'];
            $newProvider->save();
            return $newProvider;
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        } 
    }

    public function postEditProvider(Request $request)
    {
        try {
            // do your database transaction here
            $editProvider = Provider::find($request['id']);
            $editProvider->name = $request['name'];
            $editProvider->email= $request['email'];
            $editProvider->phone= $request['phone'];
            $editProvider->save();
            return $editProvider;
        } catch (\Illuminate\Database\QueryException $e) {
            return $e;//"false";
            // something went wrong with the transaction, rollback
        }
     }
    
      
    public function postDelProvider(Request $request)
    {
        try {
            // do your database transaction here
            $delProvider = Provider::find($request['id']);
            $delProvider->delete();
            return $delProvider;
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        }
     }
}
