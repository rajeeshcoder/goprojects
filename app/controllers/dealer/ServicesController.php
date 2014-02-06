<?php namespace App\Controllers\Dealer;

// Models
use App\Models\User;
use App\Models\Manufacturer;
use App\Models\Model;
use App\Models\CustomerService;
use App\Models\CustomerVehicle;
use App\Models\CustomerProfile;
use App\Models\CustomerBooking;
use App\Models\ServiceMaster;
use App\Models\ServiceMasterStatus;

use Mgallegos\LaravelJqgrid\Encoders\RequestedDataInterface;

use App\Controllers\Api\ExampleRepository;

//Events
use App\Events\InsertServiceMasterEvent;
//Rules & Validators
use App\Services\Validators\CustomerServiceValidator;
use App\Services\Rules\DealerServiceRule;
//Miscallenous.
use Input, Redirect, Sentry, Str, Notification; ;

class ServicesController extends \BaseController {

    protected $GridEncoder;

    public function __construct(RequestedDataInterface $GridEncoder)
    {
        $this->GridEncoder = $GridEncoder;
    }

    public function postQuote()
    {
        $this->GridEncoder->encodeRequestedData(new ExampleRepository(), Input::all());
    }

    public function index()
    {
    	$service_centers = User::find(Sentry::getUser()->id)->servicecenters;
		//var_dump($service_services);
        return \View::make('dealer.services.index', compact('service_centers'));
    }

    public function getServices($center_id) {
    
    	$bookings = CustomerBooking::where('service_center_id', $center_id)->get();
        $buttons = []; 
        $status_msg = [];
        $services = [];
        //var_dump($services);

        foreach($bookings as $booking) {

            // HasOne relationship.
            $service = ServiceMaster::where('booking_id', $booking->id)->first();

            if(!isset($service->id)) {
                continue;
            }

            array_push($services, $service);


            $service_status = $service->servicemasterstatus()
                             ->where('service_status.service_master_id', '=', $service->id)->get()->last();


            $status_msg["$service->id"] = $service_status;                  

            //var_dump($service_status->title);
            //$rb = new RuleBuilder;
            $testrule = new DealerServiceRule();
    
            //var_dump($service_status->title);
            
           $ret_val = ($testrule->getRuleValue($service_status->title));

            if (is_null($ret_val)) {
                $buttons["$service->id"] = [];
            }
            else {
                $buttons["$service->id"] = $ret_val;
            }
            
            //$service->[id]->[buttons] = "test";
            
       }

       //var_dump($buttons);
       return \View::make('dealer.services.index-services', compact('services', 'buttons', 'status_msg'));

    }   

    public function edit($id)
	{
        $service = CustomerService::find($id);
        return \View::make('dealer.services.edit', compact('service'));
    }

    public function update($id)
    {
           
        $validation = new CustomerServiceValidator;

        if ($validation->passes()) {
           $customer_service = CustomerService::find($id);
           $customer_service->total_km = Input::get('total_km');
           $customer_service->service_type = Input::get('service_type');
           $customer_service->service_dispatch = Input::get('service_dispatch');
           $customer_service->servicedate = Input::get('servicedate') . " 09:00:00";
           $customer_service->save();

           $customer_service->customerservicestatus()->attach(2, array('owner' => 'd', 'user_id' => Sentry::getUser()->id));
           
           Notification::success('The page was saved.');
         
           return Redirect::route('dealer.services.index'); 
           
        }
        else {
            return Redirect::back()->withInput()->withErrors($validation->errors);
        }
        
    }    

    public function getApprove($id)
    {
        $customer_service = CustomerService::find($id);
        $customer_service->customerservicestatus()->attach(4, array('owner' => 'd', 'user_id' => Sentry::getUser()->id));
        
        //$customer_service->delete();

        return Redirect::route('dealer.services.index');
    }

    public function getQuote($id)
    {
        $customer_service = ServiceMaster::find($id);
        //$customer_service->customerservicestatus()->attach(4, array('owner' => 'd', 'user_id' => Sentry::getUser()->id));
        
        //$customer_service->delete();

        return \View::make('dealer.services.quote', compact('customer_service'));
    }

    public function postStarted()
    {
        
        //if (Request::ajax()) {
          //  $customer_service = ServiceMaster::find(20);
           // $thisId = Input::get('textbox');
           // $customer_service->servicemasterstatus()->attach(2, array('owner' => 'd', 'user_id' => Sentry::getUser()->id));
            //return \View::make('dealer.services.status')->with('msg', $this.id);
        //}
        //$customer_service = CustomerService::find($id);
        //$customer_service->customerservicestatus()->attach(4, array('owner' => 'd', 'user_id' => Sentry::getUser()->id));
        
        //$customer_service->delete();

        //return Redirect::route('dealer.services.index');
    }


	public function destroy($id)
    {
        $customer_service = CustomerService::find($id);
        $customer_service->customerservicestatus()->attach(3, array('owner' => 'd', 'user_id' => Sentry::getUser()->id));
        //$customer_service->delete();

        return Redirect::route('dealer.services.index');
    }

}