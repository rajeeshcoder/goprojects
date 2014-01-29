<?php namespace App\Controllers\Dealer;

// Models
use App\Models\User;
use App\Models\Manufacturer;
use App\Models\Model;
use App\Models\CustomerBooking;
use App\Models\CustomerVehicle;
use App\Models\CustomerProfile;
//Events
use App\Events\InsertServiceMasterEvent;
//Rules & Validators
use App\Services\Validators\CustomerBookingValidator;
use App\Services\Rules\DealerBookingRule;
//Miscallenous.
use Input, Redirect, Sentry, Str, Notification; ;

class MainController extends \BaseController {

    public function index()
    {
    	$service_centers = User::find(Sentry::getUser()->id)->servicecenters;
		//var_dump($service_centers);
        return \View::make('dealer.centers.index', compact('service_centers'));
    }

    public function getBookings($center_id) {
    
    	$bookings = CustomerBooking::where('service_center_id', $center_id)->get();
        $buttons = []; 
        $status_msg = [];
        //var_dump($bookings);
        

        foreach($bookings as $booking) {

            $customer_booking = CustomerBooking::find($booking->id);

            //var_dump($customer_booking); 


        $booking_status = $customer_booking->customerbookingstatus()
                             ->Where('booking_status.customer_booking_id', '=', $booking->id)->get()->last();

        $status_msg["$booking->id"] = $booking_status;                  

            //var_dump($booking_status->title);
            //$rb = new RuleBuilder;
            $testrule = new DealerBookingRule();
    
            //var_dump($booking_status->title);
            
           $ret_val = ($testrule->findEligibility($customer_booking->servicedate, $booking_status->title));

            if (is_null($ret_val)) {
                $buttons["$booking->id"] = [];
            }
            else {
                $buttons["$booking->id"] = $ret_val;
            }
            
            //$booking->[id]->[buttons] = "test";
            
       }

       //var_dump($buttons);
       return \View::make('dealer.bookings.index', compact('bookings', 'buttons', 'status_msg'));

    }   

    public function edit($id)
	{
        $booking = CustomerBooking::find($id);
        return \View::make('dealer.bookings.edit', compact('booking'));
    }

    public function update($id)
    {
           
        $validation = new CustomerBookingValidator;

        if ($validation->passes()) {
           $customer_booking = CustomerBooking::find($id);
           $customer_booking->total_km = Input::get('total_km');
           $customer_booking->service_type = Input::get('service_type');
           $customer_booking->service_dispatch = Input::get('service_dispatch');
           $customer_booking->servicedate = Input::get('servicedate') . " 09:00:00";
           $customer_booking->save();

           $customer_booking->customerbookingstatus()->attach(2, array('owner' => 'd', 'user_id' => Sentry::getUser()->id));
           
           Notification::success('The page was saved.');
         
           return Redirect::route('dealer.bookings.index'); 
           
        }
        else {
            return Redirect::back()->withInput()->withErrors($validation->errors);
        }
        
    }    

    public function getApprove($id)
    {
        $customer_booking = CustomerBooking::find($id);
        $customer_booking->customerbookingstatus()->attach(4, array('owner' => 'd', 'user_id' => Sentry::getUser()->id));
        
        //$customer_booking->delete();

        return Redirect::route('dealer.bookings.index');
    }

	public function destroy($id)
    {
        $customer_booking = CustomerBooking::find($id);
        $customer_booking->customerbookingstatus()->attach(3, array('owner' => 'd', 'user_id' => Sentry::getUser()->id));
        //$customer_booking->delete();

        return Redirect::route('dealer.bookings.index');
    }

}