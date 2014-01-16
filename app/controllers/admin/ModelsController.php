<?php namespace App\Controllers\Admin;

use Notification; 
use App\Models\Manufacturer;
use App\Models\Model;
use App\Services\Validators\ModelValidator;
use Input, Redirect, Sentry, Str;
 
class ModelsController extends \BaseController {
 
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
                return \View::make('admin.models.index')->with('models', Model::all());
        }
 
        public function show($id)
        {
                return \View::make('admin.models.show')->with('model', Model::find($id));
        }
 
        public function create()
        {

                foreach (Manufacturer::select('id', 'title')->orderBy('title','asc')->get() as $man)
                {
                        $manufacturer[$man->id] = $man->title;
                }

                return \View::make('admin.models.create', compact('manufacturer'));
        }
 
        public function store()
        {
                $validation = new ModelValidator;
                if ($validation->passes()) {
                        $model = new Model;
                        $model->title = Input::get('title');
                        $model->user_id = Sentry::getUser()->id;
                        $model->manufacturer_id  = Input::get('manufacturer');
                        $model->save();
                        return Redirect::route('admin.models.index');
                }
                else {
                        return Redirect::back()->withInput()->withErrors($validation->errors);
                }
        }
 
        public function edit($id)
        {
                $manufacturer_id = Model::find($id)->manufacturer_id;
                        
                foreach (Manufacturer::select('id', 'title')->orderBy('title','asc')->get() as $man)
                {
                        $manufacturer[$man->id] = $man->title;
                }

                return \View::make('admin.models.edit', compact('manufacturer', 'manufacturer_id'))->with('model', Model::find($id));
        }
 
        public function update($id)
        {
                $validation = new ModelValidator;
                if ($validation->passes()) {
                        $model = Model::find($id);
                        $model->title = Input::get('title');
                        $model->user_id = Sentry::getUser()->id;
                        $model->manufacturer_id  = Input::get('manufacturer');
                        $model->save();

                        Notification::success('The page was saved.');
                     
                        return Redirect::route('admin.models.index'); 
                }
                else {
                        return Redirect::back()->withInput()->withErrors($validation->errors);
        }       }
 
        public function destroy($id)
        {
                $model = Model::find($id);
                $model->delete();
 
                return Redirect::route('admin.models.index');
        }
 
}