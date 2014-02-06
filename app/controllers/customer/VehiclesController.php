<?php namespace App\Controllers\Customer;

use Notification; 
use App\Models\User;
use App\Models\Manufacturer;
use App\Models\Model;
use App\Models\CustomerVehicle;

use App\Services\Validators\CustomerVehicleValidator;
use Input, Redirect, Sentry, Str;
 
class VehiclesController extends \BaseController {
         
         protected $user;
         protected $manufacturer;
        //protected $user;

        /**
        * Inject the models.
        * @param Post $post
        * @param User $user
        */
        public function __construct(User $user, Manufacturer $manufacturer)
        {
               // parent::__construct();

                $this->user = $user;
                $this->manufacturer = $manufacturer;
                //$this->user = $user;
        }

        public function index()
        {
               $user = CustomerVehicle::where('user_id', Sentry::getUser()->id);
               return \View::make('customer.vehicles.index')->with('vehicles', $user->get());
               
        }
 
        public function show($id)
        {
                return \View::make('customer.vehicles.show')->with('vehicle', CustomerVehicle::find($id));
        }
 
        public function create()
        {

               foreach (Manufacturer::select('id', 'title')->orderBy('title','asc')->get() as $man)
               {
                       $manufacturer[$man->id] = $man->title;
               }
               //return \View::make('customer.user_vehicles.create', compact('manufacturer'));
               $vehicle = CustomerVehicle::where('user_id', Sentry::getUser()->id)->get();
               if ($vehicle->count() < 4) {
                   return \View::make('customer.vehicles.create', compact('manufacturer'));
               }   
                
        }
 
        public function store()
        {
                $validation = new CustomerVehicleValidator;
                if ($validation->passes()) {
                        $user_vehicle = new CustomerVehicle;
                        $user_vehicle->model_id = Input::get('model');
                        $user_vehicle->reg_no = Input::get('reg_no');
                        $user_vehicle->engine_no = Input::get('engine_no');
                        $user_vehicle->chasis_no = Input::get('chasis_no');
                        $user_vehicle->color = Input::get('color');
                        $user_vehicle->regdate = Input::get('regdate');
                        $user_vehicle->user_id = Sentry::getUser()->id;
                        $user_vehicle->save();
                        return Redirect::route('customer.vehicles.index');
                }
                else {
                        return Redirect::back()->withInput()->withErrors($validation->errors);
                }
        }
 
        public function edit($id)
        {
                $man_id = CustomerVehicle::find($id)->model->manufacturer_id;
                $model_id = CustomerVehicle::find($id)->model_id;
                $model;
                foreach (Model::select('id', 'title')->where('manufacturer_id', $man_id)->orderBy('title','asc')->get() as $mod)
                {
                        $model[$mod->id] = $mod->title;
                }
               
                return \View::make('customer.vehicles.edit', compact('model', 'model_id'))->with('vehicle', CustomerVehicle::find($id));
                //return \View::make('customer.vehicles.edit')->with('vehicle', CustomerVehicle::find($id));
                
        }
 
        public function update($id)
        {
                $validation = new CustomerVehicleValidator;
                if ($validation->passes()) {
                    $user_vehicle = CustomerVehicle::find($id);
                    $user_vehicle->model_id = Input::get('model');
                    $user_vehicle->reg_no = Input::get('reg_no');
                    $user_vehicle->engine_no = Input::get('engine_no');
                    $user_vehicle->chasis_no = Input::get('chasis_no');
                    $user_vehicle->color = Input::get('color');
                    $user_vehicle->regdate = Input::get('regdate');
                    $user_vehicle->user_id = Sentry::getUser()->id;
                    $user_vehicle->save();

                    Notification::success('The page was saved.');
                 
                    return Redirect::route('customer.vehicles.index'); 
                }
                else {
                    return Redirect::back()->withInput()->withErrors($validation->errors);
        }       }
 
        public function destroy($id)
        {
                $user_vehicle = CustomerVehicle::find($id);
                $user_vehicle->delete();
 
                return Redirect::route('customer.vehicles.index');
        }
}