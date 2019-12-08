<?php

namespace App\Http\Controllers\Admin\Bookings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use Carbon\Carbon;
use App\User;
use App\Notifications\CustomNotify;
use Illuminate\Support\Facades\Notification;

class DetailedController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function getDetailed()
    {
        $bookings = Booking::all();
        return view('admin.bookings.detailed',compact('bookings'));
    }

    public function postSwitchApproved(Request $request)
    {
                $id = $request['id'];
     try{ 
            $list = Booking::find($id);
             $list->status='approved';
             $status = "true";
             $list->save();         
             $data['slug'] = 'booking-approve-user';
             $data['url'] = route('admin.bookings.detailed',$list->id);
             $user = User::find(1);
             Notification::send($user, new CustomNotify($data));
            return $status;
        }
        catch(\Exception $e){
            echo json_encode($e->getMessage());
        }
    }

    public function postSwitchCanceled(Request $request)
    {
        $id = $request['id'];
     try{ 
            $list = Booking::find($id);
             $list->status='rejected';
             $status = "true";
             $list->save();         
             $data['slug'] = 'booking-approve-user';
             $data['url'] = route('admin.bookings.detailed',$list->id);
             $user = User::find(1);
             Notification::send($user, new CustomNotify($data));
            return $status;
        }
        catch(\Exception $e){
            echo json_encode($e->getMessage());
        }
    }
}
