<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WorkingHour;
use Validator;

class WorkingHourController extends Controller
{
    public function index()
    {
        $working_hours = WorkingHour::latest()->get();
        return view('admin.settings.working_hour.index', compact('working_hours'));
    }

    public function editData(Request $request)
    {
        try{
            $id = $request['id'];
            $working_hour = WorkingHour::findorfail($id);
            $working_hour->date = $request['date'];
            $working_hour->start_time = $request['start_time'];
            $working_hour->finish_time = $request['finish_time'];
            $working_hour->status = $request['status'];
            $working_hour->save();
            return $working_hour; 
        }
        catch(\Exception $e){
            echo json_encode($e->getMessage());
        }
    }

    public function delData(Request $request)
    {
        try{
            $id = $request['id'];
            $working_hour = WorkingHour::findorfail($id);
            $working_hour->delete();
            return $working_hour; 
        }
        catch(\Exception $e){
            echo json_encode($e->getMessage());
        }
    }
    


    public function save(Request $request)
    {
        try{
            // do your database transaction here
            $newWorkinghour = new Workinghour();
            $newWorkinghour->date = $request['date'];
            $newWorkinghour->start_time = $request['start_time'];
            $newWorkinghour->finish_time = $request['finish_time'];
            $newWorkinghour->status = $request['status'];
            $newWorkinghour->save();
            return $newWorkinghour;
        } catch (\Illuminate\Database\QueryException $e) {
            return "false";
            // something went wrong with the transaction, rollback
        }
    }
}
