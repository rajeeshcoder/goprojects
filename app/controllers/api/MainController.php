<?php namespace App\Controllers\Api;

use Notification; 
use App\Models\Manufacturer;
use App\Models\Model;
use App\Models\ServiceMaster;
use Input, Redirect, Sentry, Str, Request;
 
class MainController extends \BaseController {
 
        public function getManufacturers() {
                  $manufacturers = Manufacturer::get(array('id', 'title'));    
                  return \Response::json(array(
                         'status'  => 'success',
                         'message' => 'Manufacturers successfully loaded!',
                         'manufacturers' => $manufacturers->toArray()),
                          200
                  );
        }

        public function getModels($man_id) {
                  //$manufacturer = Manufacturer::find($man_id);
                  //$models = $manufacturer->model->select('id', 'title')->get();
        			$models = Model::where('manufacturer_id', $man_id)->get(array('id', 'title'));
                  
                  return \Response::json(array(
                         'status'  => 'success',
                         'message' => 'Models successfully loaded!',
                         'models' => $models->toArray()),
                          200
                  );
        }

        public function postRule() {
          if (Request::ajax()) {
            $data = Input::all();
            $service_id = $data['service_id']; 
            $next_status_id = $data['next_status_id']; 
            $description = $data['description']; 
            $customer_service = ServiceMaster::find($service_id);
            $results = $customer_service->servicemasterstatus()->attach($next_status_id, array('description' => $description, 'user_id' => Sentry::getUser()->id));
            //$results = $customer_service->servicemasterstatus()->attach(2, array('user_id' => Sentry::getUser()->id));
            return \Response::json(array('results' => $results));
          }
        }  

        public function postQuote() {
          if (Request::ajax()) {
            $data = Input::get('rec');

            //var_dump($data);
            //$service_id = $data['service_id']; 
            //$next_status_id = $data['next_status_id']; 
            //$description = $data['description']; 
            //$customer_service = ServiceMaster::find($service_id);
            //$results = $customer_service->servicemasterstatus()->attach($next_status_id, array('description' => $description, 'user_id' => Sentry::getUser()->id));
            //$results = $customer_service->servicemasterstatus()->attach(2, array('user_id' => Sentry::getUser()->id));
            return \Response::json(array('data' => $data));
          }
        }  


        public function getQuote() {
                  //$manufacturer = Manufacturer::find($man_id);
                  //$models = $manufacturer->model->select('id', 'title')->get();
              //$models = Model::where('manufacturer_id', $man_id)->get(array('id', 'title'));
          $quotes = array(['id' => '1', 'value' => 'Brake Pad'], ['id' => '2', 'value' => 'Clutch Plate']);                  
          return json_encode($quotes);
        }
}