<?php namespace App\Controllers\Admin;

use Notification; 
use App\Models\ServiceCenter;
use App\Models\Dealer;
use App\Services\Validators\ServiceCenterValidator;
use Input, Redirect, Sentry, Str;
 
class ServiceCentersController extends \BaseController {
         
         protected $dealer;
        //protected $user;

        /**
        * Inject the models.
        * @param Post $post
        * @param User $user
        */
        public function __construct(Dealer $dealer)
        {
               // parent::__construct();

                $this->dealer = $dealer;
                //$this->user = $user;
        }

        public function index()
        {
                return \View::make('admin.service_centers.index')->with('service_centers', ServiceCenter::all());
        }
 
        public function show($id)
        {
                return \View::make('admin.service_centers.show')->with('service_center', ServiceCenter::find($id));
        }
 
        public function create()
        {

                foreach (Dealer::select('id', 'title')->orderBy('title','asc')->get() as $deal)
                {
                        $dealer[$deal->id] = $deal->title;
                }
                return \View::make('admin.service_centers.create', compact('dealer'));
        }
 
        public function store()
        {
                $validation = new ServiceCenterValidator;
                if ($validation->passes()) {
                        $service_center = new ServiceCenter;
                        $service_center->title = Input::get('title');
                        $service_center->location = Input::get('location');
                        $service_center->city = Input::get('city');
                        $service_center->state = Input::get('state');
                        $service_center->user_id = Sentry::getUser()->id;
                        $service_center->dealer_id  = Input::get('dealer');
                        $service_center->save();
                        return Redirect::route('admin.service_centers.index');
                }
                else {
                        return Redirect::back()->withInput()->withErrors($validation->errors);
                }
        }
 
        public function edit($id)
        {
                $dealer_id = ServiceCenter::find($id)->dealer_id;

                foreach (Dealer::select('id', 'title')->orderBy('title','asc')->get() as $man)
                {
                        $dealer[$man->id] = $man->title;
                }
                return \View::make('admin.service_centers.edit', compact('dealer', 'dealer_id'))->with('service_center', ServiceCenter::find($id));
        }
 
        public function update($id)
        {
                $validation = new ServiceCenterValidator;
                if ($validation->passes()) {
                        $service_center = ServiceCenter::find($id);
                        $service_center->title = Input::get('title');
                        $service_center->location = Input::get('location');
                        $service_center->city = Input::get('city');
                        $service_center->state = Input::get('state');
                        $service_center->user_id = Sentry::getUser()->id;
                        $service_center->dealer_id  = Input::get('dealer');
                        $service_center->save();

                        Notification::success('The page was saved.');
                     
                        return Redirect::route('admin.service_centers.index'); 
                }
                else {
                        return Redirect::back()->withInput()->withErrors($validation->errors);
        }       }
 
        public function destroy($id)
        {
                $service_center = ServiceCenter::find($id);
                $service_center->delete();
 
                return Redirect::route('admin.service_centers.index');
        }
 
}