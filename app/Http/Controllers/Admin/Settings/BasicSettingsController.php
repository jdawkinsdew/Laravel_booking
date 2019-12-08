<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SettingBasic;
use Toastr;
use File;
use App\Notifications\CustomNotify;
use Illuminate\Support\Facades\Notification;
class BasicSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
        public function Index()
    {
        // $setting_basic = SettingBasic::all();
        $basic = SettingBasic::where('name', 'basic')->first();
        if(!$basic)
        {
            $basic = new SettingBasic();
            $basic->name = 'basic';
            $basic->save();
        }

        // dd($basic->loadingStatus);
        return view('admin.settings.basic', compact('basic'));
    }
    public function submit(Request $request)
    { 

         $this->validate($request, [
            'name' => 'required|max:30',
            'meta_title' => 'max:100',
            'meta_keywords' => 'max:100',
            'meta_description' => 'max:600',
            'header_code' => 'max:6000',
            'footer_code' => 'max:6000',
            'style_code' => 'max:6000',
        ]);
  
        $basic = SettingBasic::where('name', 'basic')->first();
        $basic->displayName = $request->name;
        $basic->loadingColor = $request->loadingColor;
        $basic->meta_title = $request->meta_title;
        $basic->meta_keywords = $request->meta_keywords;
        $basic->meta_description = $request->meta_description;
        $basic->header_code = $request->header_code;
        $basic->footer_code = $request->footer_code;
        $basic->style_code = $request->style_code;
        $basic->link = $request->link;
    
        if($request->loading)
        {
            $basic->loadingStatus=true;
        }else {
            $basic->loadingStatus=false;
        }
         $logoImage = $request->file('logoImage');
        if($logoImage)
        {
            $new_name1 = rand() . '.' . $logoImage->getClientOriginalExtension();
            $logoImage->move(public_path('uploads/setting/basic/'), $new_name1);
            if(($basic->logoImage!='defaultLogo.png')&&file_exists(public_path('uploads/setting/basic/'.$basic->logoImage)))
            {
                File::delete(public_path('uploads/setting/basic/'.$basic->logoImage));
            }
            $basic->logoImage = $new_name1;
        }
       $faviconImage = $request->file('faviconImage');
        if($faviconImage)
        {
            $new_name2 = rand() . '.' . $faviconImage->getClientOriginalExtension();
            $faviconImage->move(public_path('uploads/setting/basic/'), $new_name2);
            if(($basic->faviconImage!='defaultFavicon.png')&&file_exists(public_path('uploads/setting/basic/'.$basic->faviconImage)))
            {
                File::delete(public_path('uploads/setting/basic/'.$basic->faviconImage));
            }
            $basic->faviconImage = $new_name2;
        }
         $basic->save();
        return redirect()->back();
    }
}
