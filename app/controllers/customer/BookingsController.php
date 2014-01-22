<?php namespace App\Controllers\Customer;

use Notification;
use App\Models\User;
use App\Models\Manufacturer;
use App\Models\Model;
use App\Models\CustomerVehicle;
use App\Models\CustomerProfile;
use App\Models\CustomerBooking;

use App\Services\Validators\CustomerVehicleValidator;
use Input, Redirect, Sentry, Str, Session;

class BookingsController extends \BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getCenter($vehicle_id, $model_id)
	{
		//var_dump($vehicle_id, $model_id);
		//$user = CustomerVehicle::where('user_id', Sentry::getUser()->id);
        //$service_centers = Manufacturer::with(array('dealers', 'dealers.service_centers'))->find($man_id->manufacturer_id)->get(array('id', 'title'));
        //$service_centers = Manufacturer::with('service_centers')->find($man_id->manufacturer_id)->get(array('id', 'title'));
		//$service_centers = Manufacturer::where($man_id);
		//var_dump($service_centers);
		//var_dump($man_id);
        //return \View::make('customer.bookings.index')->with('bookings', $user->get());

		//Session::put('service_center_id', $service_center_id);
		Session::put('vehicle_id', $vehicle_id);

		$man_id =  Model::where('id', $model_id)->first();
		$service_centers = Manufacturer::find($man_id->manufacturer_id)->servicecenters;
		return \View::make('customer.bookings.index', compact('service_centers', 'model_id'));
	}

	public function getBook($service_center_id)
    {
        Session::put('service_center_id', $service_center_id);
        return \View::make('customer.bookings.create');
    }

    public function postBook($sc_id) {
	    $user_booking = new CustomerBooking;
        $user_booking->user_id = Sentry::getUser()->id;
        $user_booking->vehicle_id = Session::get('vehicle_id');
        $user_booking->service_center_id = Session::get('service_center_id');
        $user_booking->total_km = Input::get('total_km');
        $user_booking->service_type = Input::get('service_type');
        $user_booking->service_dispatch = Input::get('service_dispatch');
        $user_booking->service_date = Input::get('service_date');
        $user_booking->save();
        Session::forget('vehicle_id');
        Session::forget('service_center_id');

        return Redirect::route('customer.vehicles.index');
}    

}