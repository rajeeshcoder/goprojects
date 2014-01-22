<?php namespace App\Controllers\Admin;

use Notification; 
use App\Models\Dealer;
use App\Models\Manufacturer;
use App\Services\Validators\DealerValidator;
use Input, Redirect, Sentry, Str;
 
class DealersController extends \BaseController {
         
         protected $manufacturer;
        //protected $user;

        /**
        * Inject the models.
        * @param Post $post
        * @param User $user
        */
        public function __construct(Manufacturer $manufacturer)
        {
               // parent::__construct();

                $this->manufacturer = $manufacturer;
                //$this->user = $user;
        }

        public function index()
        {
                return \View::make('admin.dealers.index')->with('dealers', Dealer::all());
        }
 
        public function show($id)
        {
                return \View::make('admin.dealers.show')->with('dealer', Dealer::find($id));
        }
 
        public function create()
        {

                foreach (Manufacturer::select('id', 'title')->orderBy('title','asc')->get() as $man)
                {
                        $manufacturer[$man->id] = $man->title;
                }
                return \View::make('admin.dealers.create', compact('manufacturer'));
        }
 
        public function store()
        {
                $validation = new DealerValidator;
                if ($validation->passes()) {
                        $dealer = new Dealer;
                        $dealer->title = Input::get('title');
                        $dealer->user_id = Sentry::getUser()->id;
                        $dealer->manufacturer_id  = Input::get('manufacturer');
                        $dealer->save();
                        return Redirect::route('admin.dealers.index');
                }
                else {
                        return Redirect::back()->withInput()->withErrors($validation->errors);
                }
        }
 
        public function edit($id)
        {
                $manufacturer_id = Dealer::find($id)->manufacturer_id;
                foreach (Manufacturer::select('id', 'title')->orderBy('title','asc')->get() as $man)
                {
                        $manufacturer[$man->id] = $man->title;
                }
                return \View::make('admin.dealers.edit', compact('manufacturer', 'manufacturer_id'))->with('dealer', Dealer::find($id));
        }
 
        public function update($id)
        {
                $validation = new DealerValidator;
                if ($validation->passes()) {
                        $dealer = Dealer::find($id);
                        $dealer->title = Input::get('title');
                        $dealer->user_id = Sentry::getUser()->id;
                        $dealer->manufacturer_id  = Input::get('manufacturer');
                        $dealer->save();

                        Notification::success('The page was saved.');
                     
                        return Redirect::route('admin.dealers.index'); 
                }
                else {
                        return Redirect::back()->withInput()->withErrors($validation->errors);
        }       }
 
        public function destroy($id)
        {
                $dealer = Dealer::find($id);
                $dealer->delete();
 
                return Redirect::route('admin.dealers.index');
        }
 
}