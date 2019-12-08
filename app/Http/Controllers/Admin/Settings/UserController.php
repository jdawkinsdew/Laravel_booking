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
class UserController extends Controller
{
       public function __construct()
    {
        $this->middleware('web');
    }

    

           
   public function postNewUser(Request $request)
    {
        try {
            // do your database transaction here
            $newUser = new User();
            $newUser->role_id = $request['role_id'];
            $newUser->name = $request['name'];
            $newUser->username = $request['username'];
            $newUser->email = $request['email'];
            $newUser->phhone = $request['phone'];
            $newUser->password = $request['password'];
            $newUser->remember_token = $request['remember_token'];
            $newUser->active= $request['active'];         
            $newUser->save();
            return $newUser;
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        } 
    }

    public function postEditUser(Request $request)
    {
        try {
            // do your database transaction here
            $editUser = User::find($request['id']);
            $editUser->name = $request['name'];
            $editUser->email= $request['email'];
            $editUser->phhone= $request['phone'];
            $editUser->active= $request['active'];
            $editUser->role_id= $request['role_id'];
            $editUser->save();
            return $editUser;
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        }
     }
    
      
    public function postDelUser(Request $request)
    {
        try {
            // do your database transaction here
            $delUser = User::find($request['id']);
            $delUser->delete();
            return $delUser;
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        }
     }

 

    public function getUsers()
    {
        $users = User::all();
        return view('admin.settings.users',compact('users'));
    }
}
