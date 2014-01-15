<?php namespace App\Controllers\Admin;

use Notification; 
use App\Models\Manufacturer;
use App\Services\Validators\ManufacturerValidator;
use Input, Redirect, Sentry, Str;
 
class ManufacturersController extends \BaseController {
 
        
        

        public function index()
        {
                return \View::make('admin.manufacturers.index')->with('manufacturers', Manufacturer::all());
        }
 
        public function show($id)
        {
                return \View::make('admin.manufacturers.show')->with('manufacturer', Manufacturers::find($id));
        }
 
        public function create()
        {
                return \View::make('admin.manufacturers.create');
        }
 
        public function store()
        {
                $validation = new ManufacturerValidator;
                if ($validation->passes()) {
                        $manufacturer = new Manufacturer;
                        $manufacturer->title = Input::get('title');
                        $manufacturer->user_id = Sentry::getUser()->id;
                        $manufacturer->save();
                        return Redirect::route('admin.manufacturers.index');
                }
                else {
                        return Redirect::back()->withInput()->withErrors($validation->errors);
                }
        }
 
        public function edit($id)
        {
                return \View::make('admin.manufacturers.edit')->with('manufacturer', Manufacturer::find($id));
        }
 
        public function update($id)
        {
                $validation = new ManufacturerValidator;
                if ($validation->passes()) {
                        $manufacturer = Manufacturer::find($id);
                        $manufacturer->title = Input::get('title');
                        $manufacturer->user_id = Sentry::getUser()->id;
                        $manufacturer->save();

                        Notification::success('The page was saved.');
                     
                        return Redirect::route('admin.manufacturers.index'); 
                }
                else {
                        return Redirect::back()->withInput()->withErrors($validation->errors);
        }       }
 
        public function destroy($id)
        {
                $manufacturer = Manufacturer::find($id);
                $manufacturer->delete();
 
                return Redirect::route('admin.manufacturers.index');
        }
 
}