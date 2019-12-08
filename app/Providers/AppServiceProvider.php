<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SettingBasic;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
          view()->composer('admin.layouts.master',
            function ($view) {
                $basic = SettingBasic::where('name', 'basic')->first();
                if($basic)
                {
                    $logoImage = $basic->logoImage;
                    $faviconImage = $basic->faviconImage;
                    $websiteName = $basic->displayName;
                    $loadingColor = $basic->loadingColor;
                    $loadingStatus = $basic->loadingStatus;
                    $headerCode = $basic->header_code;
                    $footerCode = $basic->footer_code;
                    $styleCode = $basic->style_code;
                    $link = $basic->link;
                    $profileImage = $basic->profileImage;
                    $manager_name = $basic->manager_name;
                }else {
                    $logoImage = 'defaultLogo.png';
                    $faviconImage = 'defaultFavicon.png';
                    $websiteName = 'Your Website';
                    $loadingColor = '#222222';
                    $loadingStatus = true;
                    $headerCode = '';
                    $footerCode = '';
                    $styleCode = '';
                    $link = '|';
                    $profileImage = 'avatar2.jpg';
                    $manager_name = 'User';
                }
                $view->with(['logo'=>$logoImage, 'favicon' => $faviconImage, 'websiteName' => $websiteName, 'loadingColor' => $loadingColor, 'loadingStatus' => $loadingStatus,
                 'headerCode' => $headerCode, 'footerCode' => $footerCode, 'styleCode' => $styleCode, 'link' => $link,'profileImage' => $profileImage,
                 'manager_name'=>$manager_name]);
            });
    }
}
