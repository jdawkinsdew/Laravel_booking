<?php

namespace App\Http\Controllers\Admin\UserManage;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Validator;
use Carbon\Carbon;
use File;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.userManage.user.index');
    }
    public function getData()
    {
        try{
            $users = User::where('id', '!=', '1')->get();
            $view = view('admin.userManage.user.ajaxTable', compact('users'))->render();
            if(!$view)
            {
                $view = "<div class='no_result'>No Result.</div>";
            }
            return response()->json(compact('view'));
        }
        catch(\Exception $e){
            echo json_encode($e->getMessage());
        }
    }
    public function create()
    {
        return view('admin.userManage.user.create');
    }
    public function store(Request $request)
    {
        try{
            $validation = Validator::make($request->all(), [
                'username' => 'required|min:4|max:20|unique:users,username',
                'name' => 'required|max:20',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'confirm_password' => 'required|string|same:password',
                'image' =>'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if($validation->passes())
            {
                $user = new User();
                $user->username = $request->username;
                $user->name = $request->name;
                $user->email = $request->email;
                if($request->email_verified ==  '1')
                {
                    $user->email_verified_at = Carbon::now();
                }else {
                    $user->email_verified_at = null;
                }
                if($request->status ==  '1')
                {
                    $user->status = 'active';
                }else {
                    $user->status = 'inactive';
                }
                $image = $request->file('image');
                if($image)
                {
                    $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/avatar/'), $new_name);
                    $user->avatar = $new_name;
                }
                if($request->about)
                {
                    $user->about = $request->about;
                }
                $user->remember_token = str_random(40);
                $user->password = Hash::make($request->password);
                $user->save();

                $subscriber = new Subscriber();
                $subscriber->token = str_random(64);
                if($user->email_verified_at==null)
                {
                    $subscriber->status = false;
                    $subscriber->newsletter = false;
                }else {
                    $subscriber->status = true;
                    $subscriber->newsletter = true;
                }
                $subscriber->email = $user->email;
                $subscriber->save();

                return response()->json([
                    'success' => 'success'
                ]);
            }else{
                return response()->json([
                    'errors' => $validation->errors()
                ]);
            }
        }
        catch(\Exception $e){
            echo json_encode($e->getMessage());
        }
    }
    public function edit($username)
    {
        $user = User::where('username', $username)->first();
        return view('admin.userManage.user.edit', compact('user'));
    }
    public function profileUpdate(Request $request, $username)
    {
        try{

            $user = User::where('username', $username)->first();
            $validation = Validator::make($request->all(), [
                'name' => 'required|max:20',
                'email' => 'required|email|unique:users,email,'.$user->id,
                'username' => 'required|unique:users,username,'.$user->id,
                'image' =>'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if($validation->passes())
            {
                $user->name = $request->name;
                 $user->email = $request->email;
                $user->username = $request->username;
                $user->role_id = $request->role;
                if($request->email_verified ==  '1')
                {
                    $user->email_verified_at = Carbon::now();
                }else {
                    $user->email_verified_at = null;
                }
                if($request->status ==  '1')
                {
                    $user->status = 'active';
                }else {
                    $user->status = 'inactive';
                }
                $image = $request->file('image');
                if($image)
                {
                    $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/avatar/'), $new_name);
                    if($user->image!='default.png'&&file_exists(public_path('uploads/avatar/'.$user->image)))
                    {
                        File::delete(public_path('uploads/avatar/'.$user->image));
                    }
                    $user->avatar = $new_name;
                }
                if($request->about)
                {
                    $user->about = $request->about;
                }
                $user->save();

                return response()->json([
                    'success' => 'success'
                ]);
            }else{
                return response()->json([
                    'errors' => $validation->errors()
                ]);
            }
        }
        catch(\Exception $e){
            echo json_encode($e->getMessage());
        }
    }
    public function passwordUpdate(Request $request, $username)
    {
        try{
            $validation = Validator::make($request->all(), [
                'new_password' => 'required|min:8',
                'confirm_password' =>'required|same:new_password'
            ]);

            if($validation->passes())
            {
                $user = User::where('username', $username)->first();
                $user->password = Hash::make($request->new_password);
                $user->save();
                return response()->json([
                    'success' => 'success'
                ]);
            }else{
                return response()->json([
                    'errors' => $validation->errors()
                ]);
            }
        }
        catch(\Exception $e){
            echo json_encode($e->getMessage());
        }
    }
    public function deleteData(Request $request)
    {
        try{
            $id = $request->get('id');
            $user = User::where('id', $id)->where('role', '!=', 'admin')->first();
            $image = $user->image;
            $user->delete();
            if($user->image!='default.png'&&file_exists(public_path('uploads/avatar/'.$image)))
            {
                File::delete(public_path('uploads/avatar/'.$image));
            }
            $users = User::where('id', '!=', '1')->get();
            $view = view('admin.userManage.user.ajaxTable', compact('users'))->render();
            if(!$view)
            {
                $view = "<div class='no_result'>No Result.</div>";
            }
            return response()->json(compact('view'));
        }
        catch(\Exception $e){
            echo json_encode($e->getMessage());
        }
    }
}
