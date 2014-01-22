<?php namespace App\Controllers\Customer;

use Notification; 
use App\Models\User;
use App\Models\CustomerProfile;
use App\Services\Validators\CustomerProfileValidator;
use Input, Redirect, Sentry, Str;
 
class ProfilesController extends \BaseController {
         
         protected $user;
        //protected $user;

        /**
        * Inject the models.
        * @param Post $post
        * @param User $user
        */
        public function __construct(User $user)
        {
               // parent::__construct();

                $this->user = $user;
                //$this->user = $user;
        }

        public function index()
        {
               $user = CustomerProfile::where('user_id', Sentry::getUser()->id);
              // var_dump(Sentry::getUser()->id);
               return \View::make('customer.profiles.index')->with('profiles', $user->get());
               
        }
 
        public function show($id)
        {
                return \View::make('customer.profiles.show')->with('profile', CustomerProfile::find($id));
        }
 
        public function create()
        {

               // foreach (Manufacturer::select('id', 'title')->orderBy('title','asc')->get() as $man)
                //{
                 //       $manufacturer[$man->id] = $man->title;
                //}
                //return \View::make('customer.user_profiles.create', compact('manufacturer'));
               $profile = CustomerProfile::where('user_id', Sentry::getUser()->id)->get();
               //if ($profile->count() < 3) {
                   return \View::make('customer.profiles.create');
               //}   
                
        }
 
        public function store()
        {
                //$validation = new CustomerProfileValidator;
                //if ($validation->passes()) {
                        $user_profile = new CustomerProfile;
                        $user_profile->title = Input::get('title');
                        $user_profile->primary_phone = Input::get('primary_phone');
                        $user_profile->secondary_phone = Input::get('secondary_phone');
                        $user_profile->address = Input::get('address');
                        $user_profile->city = Input::get('city');
                        $user_profile->state = Input::get('state');
                        $user_profile->user_id = Sentry::getUser()->id;
                        $user_profile->save();
                        return Redirect::route('customer.profiles.index');
               // }
               // else {
                //        return Redirect::back()->withInput()->withErrors($validation->errors);
                //}
        }
 
        public function edit($id)
        {
               /* $manufacturer_id = Userprofile::find($id)->manufacturer_id;
                foreach (Manufacturer::select('id', 'title')->orderBy('title','asc')->get() as $man)
                {
                        $manufacturer[$man->id] = $man->title;
                }
                */
                //return \View::make('customer.user_profiles.edit', compact('manufacturer', 'manufacturer_id'))->with('user_profile', Userprofile::find($id));
                return \View::make('customer.profiles.edit')->with('profile', CustomerProfile::find($id));
                
        }
 
        public function update($id)
        {
                $validation = new CustomerProfileValidator;
                if ($validation->passes()) {
                        $user_profile = CustomerProfile::find($id);
                        $user_profile->title = Input::get('title');
                        $user_profile->primary_phone = Input::get('primary_phone');
                        $user_profile->secondary_phone = Input::get('secondary_phone');
                        $user_profile->address = Input::get('address');
                        $user_profile->city = Input::get('city');
                        $user_profile->state = Input::get('state');
                        $user_profile->user_id = Sentry::getUser()->id;
                        $user_profile->save();

                        Notification::success('The page was saved.');
                     
                        return Redirect::route('customer.profiles.index'); 
                }
                else {
                        return Redirect::back()->withInput()->withErrors($validation->errors);
        }       }
 
        public function destroy($id)
        {
                $user_profile = CustomerProfile::find($id);
                $user_profile->delete();
 
                return Redirect::route('customer.profiles.index');
        }
}