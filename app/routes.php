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

//User routes.
Route::get('user/logout', array('as' => 'user.logout', 'uses' => 'App\Controllers\User\AuthController@getLogout'));
Route::get('user/login', array('as' => 'user.login', 'uses' => 'App\Controllers\User\AuthController@getLogin'));
Route::post('user/login', array('as' => 'user.login.post', 'uses' => 'App\Controllers\User\AuthController@postLogin'));
Route::get('user/register', array('as' => 'user.register', 'uses' => 'App\Controllers\User\AuthController@getRegister'));
Route::post('user/register', array('as' => 'user.register.post', 'uses' => 'App\Controllers\User\AuthController@postRegister'));

//Admin routes.
Route::get('admin/logout', array('as' => 'admin.logout', 'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/login', array('as' => 'admin.login', 'uses' => 'App\Controllers\Admin\AuthController@getLogin'));
Route::post('admin/login', array('as' => 'admin.login.post', 'uses' => 'App\Controllers\Admin\AuthController@postLogin'));

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
        Route::any('/', 'App\Controllers\Admin\ManufacturersController@index');
        Route::resource('manufacturers', 'App\Controllers\Admin\ManufacturersController');
});