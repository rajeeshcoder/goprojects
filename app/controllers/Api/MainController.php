<?php namespace App\Controllers\Api;

use Notification; 
use App\Models\Manufacturer;
use App\Models\Model;
use Input, Redirect, Sentry, Str;
 
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

}