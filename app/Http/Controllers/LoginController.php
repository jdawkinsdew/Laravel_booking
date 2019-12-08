<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

      use AuthenticatesUsers;
      protected $username   = 'username';
      protected $redirectTo = '/dashboard';
      protected $guard = 'web';
    //

    public function getLogin()
    {
        if(Auth::guard('web')->check())
        {
             return redirect()->route('dashboard');
        }

        
        return view('login');
    }
    public function register(){
        return view('register');
    }

    public function postLogin(Request $request)
    {
        $auth_admin = Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password, 'active'=> 1, 'role_id'=>1]);
        $auth_client = Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password, 'role_id'=> 5]);
        
        if($auth_admin)
        {
            return redirect()->route('dashboard');
        }
        if($auth_client){
            return redirect()->route('client.index');
        }
          return redirect()->route('/');
    } 

    public function getLogout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('/');
    }

    public function addClient(Request $request)
    {
        // dd($request);
        if( $request->get('password') != $request->get('repassword') ){
            return back();
        } 
        $user = User::all()->where('email', $request->get('email'));
        if( $user->Count() !=0 ){
            return back();
        }
        // $area = Managed_Area::all()->where('zip_code', $request->get('zipcode'));
        // if( $area->Count() == 0 ){
        //     return back();
        // }
        $user = new User();
        $user->username = $request->name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->zip_code = Hash::make($request->zipcode);
        $user->role_id = 5;
        $user->save();
        return redirect()->route('client.index');
    }

}
    
