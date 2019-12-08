<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layouts.master');
// });

Route::get('/',['as'=>'/','uses'=>'LoginController@getLogin']);
Route::post('/login',['as'=>'login','uses'=>'LoginController@postLogin']);
Route::get('/logout',['as'=>'logout','uses'=>'LoginController@getLogout']);
Route::get('/login',['as'=>'login','uses'=>'LoginController@postLogin']);
Route::get('/register',['as'=>'register','uses'=>'LoginController@register']);
Route::post('/client',['as'=>'addClient','uses'=>'LoginController@addClient']);

Route::group(['middleware' => ['authen', 'roles'],'roles'=>['admin']],function(){
    Route::get('/dashboard',['as'=>'dashboard','uses'=>'DashboardController@dashboard']);
});


Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin',['middleware' => ['authen', 'roles'],'roles'=>['admin']]], function () {
       Route::group(['prefix' => 'bookings','as'=>'bookings.','namespace'=>'Bookings'],function()  
        {  
            Route::get('calendar',['as'=>'calendar','uses'=>'CalendarController@getCalendar']);
            Route::get('detailed',['as'=>'detailed','uses'=>'DetailedController@getDetailed']);
            Route::get('postSwitchApproved',['as'=>'postSwitchApproved','uses'=>'DetailedController@postSwitchApproved']);
            Route::get('postSwitchCanceled',['as'=>'postSwitchCanceled','uses'=>'DetailedController@postSwitchCanceled']);
        });
        Route::group(['prefix' =>'reports','as'=>'reports.','namespace'=>'Reports'],function()
        {  
            Route::get('bookings',['as'=>'bookings','uses'=>'BookingController@getBookings']);
            Route::get('prevbooking',['as'=>'prevbooking','uses'=>'BookingController@getPreveBookings']);
            Route::get('nextbooking',['as'=>'nextbooking','uses'=>'BookingController@getNextBookings']);


            Route::get('prevperformed_services',['as'=>'prevperformed_services','uses'=>'PerformencedController@getPrevPerformedServices']);
            Route::get('nextperformed_services',['as'=>'nextperformed_services','uses'=>'PerformencedController@getNextPerformedServices']);
            Route::get('performed_services',['as'=>'performed_services','uses'=>'PerformencedController@getPerformedServices']);
            
            
            Route::get('nextRevenue',['as'=>'nextRevenue','uses'=>'RevenueController@getNextRevenue']);
            Route::get('prevRevenue',['as'=>'prevRevenue','uses'=>'RevenueController@getPrevRevenue']);
             Route::get('revenue',['as'=>'revenue','uses'=>'RevenueController@getRevenue']);

            Route::get('capacity_utilization',['as'=>'capacity_utilization','uses'=>'CapacityutilController@getCapacityUtil']);


            Route::get('new_unique_customer',['as'=>'new_unique_customer','uses'=>'NewuniqueController@getNewUniqueCustomer']);
        });
        Route::group(['prefix' => 'settings','as'=>'settings.','namespace'=>'Settings'],function()  
        {

            Route::get('serivce_providers/{id}',['as'=>'serivce_providers','uses'=>'ServiceproviderController@getServicesProviders']);
            Route::get('postAvailableEditService', ['as' => 'postAvailableEditService', 'uses' => 'ServiceproviderController@postAvailableEditService']);
            Route::get('postAvailableNewService', ['as' => 'postAvailableNewService', 'uses' => 'ServiceproviderController@postAvailableNewService']);
            Route::get('postAvailableDelServices', ['as' => 'postAvailableDelServices', 'uses' => 'ServiceproviderController@postAvailableDelServices']);
        
            Route::get('areas',['as'=>'areas','uses'=>'RegionController@getAreas']);
            Route::get('postEditRegion', ['as' => 'postEditRegion', 'uses' => 'RegionController@postEditRegion']);
            Route::get('postNewRegion', ['as' => 'postNewRegion', 'uses' => 'RegionController@postNewRegion']);
            Route::get('postDelRegion', ['as' => 'postDelRegion', 'uses' => 'RegionController@postDelRegion']);
        
            Route::get('postEditBlock', ['as' => 'postEditBlock', 'uses' => 'ServiceproviderController@postEditBlock']);
            Route::get('postNewBlock', ['as' => 'postNewBlock', 'uses' => 'ServiceproviderController@postNewBlock']);
            Route::get('postDelBlock', ['as' => 'postDelBlock', 'uses' => 'ServiceproviderController@postDelBlock']);
        
            Route::get('postEditManagedAreas', ['as' => 'postEditManagedAreas', 'uses' => 'ServiceproviderController@postEditManagedAreas']);
            Route::get('postNewManagedAreas', ['as' => 'postNewManagedAreas', 'uses' => 'ServiceproviderController@postNewManagedAreas']);
            Route::get('postDelManagedAreas', ['as' => 'postDelManagedAreas', 'uses' => 'ServiceproviderController@postDelManagedAreas']);
        
            Route::get('postEditService', ['as' => 'postEditService', 'uses' => 'ServicesController@postEditService']);
            Route::get('postNewService', ['as' => 'postNewService', 'uses' => 'ServicesController@postNewService']);
            Route::get('postDelService', ['as' => 'postDelService', 'uses' => 'ServicesController@postDelService']);
            Route::get('services',['as'=>'services','uses'=>'ServicesController@getServices']);
            
            Route::get('service_add_ons',['as'=>'service_add_ons','uses'=>'AddonsController@getServiceAddons']);
            Route::get('postEditAddOnService', ['as' => 'postEditAddOnService', 'uses' => 'AddonsController@postEditAddOnService']);
            Route::get('postNewAddOnService', ['as' => 'postNewAddOnService', 'uses' => 'AddonsController@postNewAddOnService']);
            Route::get('postDelAddOnService', ['as' => 'postDelAddOnService', 'uses' => 'AddonsController@postDelAddOnService']);

            Route::get('providers',['as'=>'providers','uses'=>'ProviderController@getProviders']);
            Route::get('postEditProvider', ['as' => 'postEditProvider', 'uses' => 'ProviderController@postEditProvider']);
            Route::get('postNewProvider', ['as' => 'postNewProvider', 'uses' => 'ProviderController@postNewProvider']);
            Route::get('postDelProvider', ['as' => 'postDelProvider', 'uses' => 'ProviderController@postDelProvider']);
            
            // Route::get('users',['as'=>'users','uses'=>'UserController@getUsers']);
            // Route::get('postEditUser', ['as' => 'postEditUser', 'uses' => 'UserController@postEditUser']);
            // Route::get('postNewUser', ['as' => 'postNewUser', 'uses' => 'UserController@postNewUser']);
            // Route::get('postDelUser', ['as' => 'postDelUser', 'uses' => 'UserController@postDelUser']);
            
      
            // Route::get('clients',['as'=>'clients','uses'=>'ClientsController@getClients']);
           
            // Route::get('intake_forms',['as'=>'intake_forms','uses'=>'IntakeformController@getIntakeForms']);
          
            Route::get('discount',['as'=>'discount','uses'=>'TimesettingsController@getDiscount']);
            Route::get('time_settings',['as'=>'time_settings','uses'=>'TimesettingsController@getTimeSettings']);
            Route::get('basic_settings',['as'=>'basic_settings','uses'=>'BasicSettingsController@Index']);
            Route::get('basic_settings/submit',['as'=>'basic_settings.submit','uses'=>'BasicSettingsController@submit']);


            Route::get('working_hour/index',['as'=>'working_hour.index','uses'=>'WorkingHourController@index']);
            Route::get('working_hour/editData',['as'=>'working_hour.editData','uses'=>'WorkingHourController@editData']);
            Route::get('working_hour/delData',['as'=>'working_hour.delData','uses'=>'WorkingHourController@delData']);
            Route::get('working_hour/save',['as'=>'working_hour.save','uses'=>'WorkingHourController@save']);
            
            Route::get('user_manage/index',['as'=>'user_manage.index','uses'=>'UserManageController@index']);
            Route::get('user_manage/getData',['as'=>'user_manage.getData','uses'=>'UserManageController@getData']);
            Route::get('user_manage/delData',['as'=>'user_manage.delData','uses'=>'UserManageController@delData']);
	        Route::post('user_manage/profileupdate/{username}',['as'=>'user_manage.profileupdate','uses'=>'UserManageController@profileUpdate']);
            Route::get('user_manager/edit/{username}', 'UserManageController@edit')->name('user_manage.edit');
            Route::post('user_manage/passwordupdate/{username}',['as'=>'user_manage.passwordupdate','uses'=>'UserManageController@passwordUpdate']);
            Route::get('user_manage/create',['as'=>'user_manage.create','uses'=>'UserManageController@create']);
            Route::post('user_manage/store',['as'=>'user_manage.store','uses'=>'UserManageController@store']);
            Route::get('user_manage/deleteData',['as'=>'user_manage.deleteData','uses'=>'UserManageController@deleteData']);

            // Route::get('/import_excel',['as'=>'import_excel','uses'=>'ImportExcelController@index']);
            // Route::post('import', ['as'=>'import','uses'=>'ImportExcelController@import']); 
        });
        Route::group(['prefix' => 'others','as'=>'others.'], function()  
        {
         Route::get('other',['as'=>'other','uses'=>'OthersController@getOthers']);
        });
 });


 Route::group(['as'=>'client.','prefix'=>'client','namespace'=>'Client', ['middleware' => ['authen', 'roles'],'roles'=>['client']]], function(){
    Route::get('index',['as'=>'index','uses'=>'MainController@index']);
    Route::get('/selectAjax', 'MainController@selectAjax')->name('selectAjax');
    Route::post('/clientBooking',['as'=>'clientBooking','uses'=>'MainController@addBooking']);
    Route::post('selectProvider/onetime',['as'=>'selectProvider.onetime','uses'=>'MainController@selectProvider']);
    
    
});


 