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
class TimesettingsController extends Controller
{
       public function __construct()
    {
        $this->middleware('web');
    }
    public function getTimeSettings()
    {
        return view('admin.settings.time_settings');
    }

    public function getDiscount()
    {
        return view('admin.settings.discount');
    }
}
