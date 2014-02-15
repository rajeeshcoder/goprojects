<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' =>'HomeController@getDashBoard'));

// User Authentication routes.
Route::get('customer/logout', array('as' => 'customer.logout', 'uses' => 'App\Controllers\Customer\AuthController@getLogout'));
Route::get('customer/login', array('as' => 'customer.login', 'uses' => 'App\Controllers\Customer\AuthController@getLogin'));
Route::post('customer/login', array('as' => 'customer.login.post', 'uses' => 'App\Controllers\Customer\AuthController@postLogin'));
Route::get('customer/register', array('as' => 'customer.register', 'uses' => 'App\Controllers\Customer\AuthController@getRegister'));
Route::post('customer/register', array('as' => 'customer.register.post', 'uses' => 'App\Controllers\Customer\AuthController@postRegister'));

//Admin Authentication routes.
Route::get('admin/logout', array('as' => 'admin.logout', 'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/login', array('as' => 'admin.login', 'uses' => 'App\Controllers\Admin\AuthController@getLogin'));
Route::post('admin/login', array('as' => 'admin.login.post', 'uses' => 'App\Controllers\Admin\AuthController@postLogin'));

// Admin Route restriction.
Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
        Route::any('/', 'App\Controllers\Admin\ManufacturersController@index');
        Route::resource('manufacturers', 'App\Controllers\Admin\ManufacturersController');
        Route::resource('models', 'App\Controllers\Admin\ModelsController');
        Route::resource('dealers', 'App\Controllers\Admin\DealersController');
        Route::resource('service_centers', 'App\Controllers\Admin\ServiceCentersController');

        # Admin Dashboard
        Route::controller('/', 'App\Controllers\Admin\ModelsController');
        Route::controller('/', 'App\Controllers\Admin\ManufacturersController');
});

//Admin Authentication routes.
Route::get('dealer/logout', array('as' => 'dealer.logout', 'uses' => 'App\Controllers\Dealer\AuthController@getLogout'));
Route::get('dealer/login', array('as' => 'dealer.login', 'uses' => 'App\Controllers\Dealer\AuthController@getLogin'));
Route::post('dealer/login', array('as' => 'dealer.login.post', 'uses' => 'App\Controllers\Dealer\AuthController@postLogin'));

// Admin Route restriction.
Route::group(array('prefix' => 'dealer', 'before' => 'auth.dealer'), function()
{
    Route::any('/', 'App\Controllers\Dealer\MainController@index');
    Route::resource('centers', 'App\Controllers\Dealer\MainController');
    Route::resource('bookings', 'App\Controllers\Dealer\MainController');
    Route::resource('services', 'App\Controllers\Dealer\ServicesController');

    Route::get('dealer/bookings/booking/{id}', array('as' => 'dealer.centers.bookings', 'uses' => 'App\Controllers\Dealer\MainController@getBookings'));
    Route::get('dealer/services/service/{id}', array('as' => 'dealer.centers.services', 'uses' => 'App\Controllers\Dealer\ServicesController@getServices'));
    Route::post('dealer/services/service/started', array('as' => 'dealer.services.started', 'uses' => 'App\Controllers\Dealer\ServicesController@postStarted'));
    Route::get('dealer/services/quote/{id}', array('as' => 'dealer.services.quote', 'uses' => 'App\Controllers\Dealer\ServicesController@getQuote'));
    Route::post('dealer/services/quote', array('as' => 'dealer.services.postquote', 'uses' => 'App\Controllers\Dealer\ServicesController@postQuote'));
    Route::post('dealer/services/quotedata', array('as' => 'dealer.services.postquotedata', 'uses' => 'App\Controllers\Dealer\ServicesController@postQuoteData'));

    Route::get('dealer/bookings/approve/{id}', array('as' => 'dealer.bookings.approve', 'uses' => 'App\Controllers\Dealer\MainController@getApprove'));Route::get('dealer/bookings/approve/{id}', array('as' => 'dealer.bookings.approve', 'uses' => 'App\Controllers\Dealer\MainController@getApprove'));


    Route::controller('bookings', 'App\Controllers\Dealer\MainController');
});

//Customer route restriction.
Route::group(array('prefix' => 'customer', 'before' => 'auth.customer'), function()
{
	//Customer routes.
    Route::any('/', 'App\Controllers\Customer\ProfilesController@index');
	Route::resource('profiles', 'App\Controllers\Customer\ProfilesController');
	Route::resource('services', 'App\Controllers\Customer\ServicesController');
	Route::resource('vehicles', 'App\Controllers\Customer\VehiclesController');
	Route::resource('bookings', 'App\Controllers\Customer\BookingsController');
    Route::resource('services', 'App\Controllers\Customer\ServicesController');


    Route::get('customer/bookings/book/{id}', array('as' => 'customer.bookings.book', 'uses' => 'App\Controllers\Customer\BookingsController@getBook'));
    Route::post('customer/bookings/book{id}', array('as' => 'customer.bookings.postbook', 'uses' => 'App\Controllers\Customer\BookingsController@postBook'));
    Route::get('customer/bookings/status/{id}', array('as' => 'customer.bookings.status', 'uses' => 'App\Controllers\Customer\BookingsController@getStatus'));
    Route::get('customer/bookings/cancel/{id}', array('as' => 'customer.bookings.cancel', 'uses' => 'App\Controllers\Customer\BookingsController@getCancel'));
    Route::get('customer/bookings/modify/{id}', array('as' => 'customer.bookings.modify', 'uses' => 'App\Controllers\Customer\BookingsController@getModify'));
    Route::get('customer/bookings/confirm/{id}', array('as' => 'customer.bookings.confirm', 'uses' => 'App\Controllers\Customer\BookingsController@getConfirm'));
    Route::controller('bookings', 'App\Controllers\Customer\BookingsController');
    Route::controller('services', 'App\Controllers\Customer\ServicesController');
    
    //Route::any('/bookings', 'App\Contrsidollers\Customer\BookingsController@getCenter');

});

Route::get('/api/main/models/id/{id}', 'App\Controllers\Api\MainController@getModels');
Route::get('/api/main/quote', 'App\Controllers\Api\MainController@getQuote');
Route::post('/api/main/quote', 'App\Controllers\Api\MainController@postQuote');
Route::post('/api/main/rule', 'App\Controllers\Api\MainController@postRule');