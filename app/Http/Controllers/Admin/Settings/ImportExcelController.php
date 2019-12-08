<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Excel;

class ImportExcelController extends Controller
{
    function index()
    {
     $data = DB::table('table_d')->orderBy('id', 'DESC')->get();
     return view('admin.settings.import_excel', compact('data'));
    }
    function import(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);
     $path = $request->file('select_file')->getRealPath();
    $data = Excel::load($path, function($reader){})->get();
    
    //  $data = Excel::load($path)->get();

     if($data->count() > 0)
     {
        foreach ($data as $key => $value) {
                $insert_data[] = ['title' => $value->title, 'description' => $value->description];
            }
      if(!empty($insert_data))
      {
       DB::table('table_d')->insert($insert_data);
      }
     }
     return back()->with('success', 'Excel Data Imported successfully.');
    }
}
