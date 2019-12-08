<?php

namespace App\Http\Controllers\Admin\UserManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Validator;
use File;

class SubscriberController extends Controller
{
    public function index()
    {
        return view('admin.userManage.subscriber.index');
    }
    public function getData()
    {
        try{
            $subscribers = Subscriber::latest()->get();
            $view = view('admin.userManage.subscriber.ajaxTable', compact('subscribers'))->render();
            if(!$view)
            {
                $view = "<div class='preloader_section'>No Result.</div>";
            }
            return response()->json(compact('view'));
        }
        catch(\Exception $e){
            echo json_encode($e->getMessage());
        }
    }
    public function switchStatus(Request $request)
    {
        try{
            $id = $request->get('id');
            $subscriber = Subscriber::findorfail($id);
            if($subscriber->status==true)
            {
                $subscriber->status=false;
                $status = 'false';
            }else {
                $subscriber->status=true;
                $status = 'true';
            }
            $subscriber->save();
            return $status;
        }
        catch(\Exception $e){
            echo json_encode($e->getMessage());
        }
    }
    public function createData(Request $request)
    {
        try{

            $validation = Validator::make($request->all(), [
                'email' => 'required|email|unique:subscribers,email'
            ]);

            if($validation->passes())
            {
                if($request->subscriber_id==null)
                {
                    $subscriber = new Subscriber();
                }else {
                    $subscriber = Subscriber::findorfail($request->subscriber_id);
                }
                $subscriber->email = $request->email;
                if(!$request->status)
                {
                    $subscriber->status = false;
                }else {
                    $subscriber->status = true;
                }
                $subscriber->token = str_random(64);
                $subscriber->save();
                $subscribers = Subscriber::latest()->get();
                $view = view('admin.userManage.subscriber.ajaxTable', compact('subscribers'))->render();
                return response()->json(compact('view'));

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
            $subscriber= Subscriber::findorfail($id);
            $subscriber->delete();
            $subscribers = Subscriber::latest()->get();
            $view = view('admin.userManage.subscriber.ajaxTable', compact('subscribers'))->render();
            return response()->json(compact('view'));
        }
        catch(\Exception $e){
            echo json_encode($e->getMessage());
        }
    }
}
