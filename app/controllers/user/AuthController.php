<?php namespace App\Controllers\User;
 
use App\Services\Validators\UserRegisterValidator; 
use Auth, BaseController, Form, Input, Redirect, Sentry, View;
 
class AuthController extends BaseController {
 
        /**
         * Display the login page
         * @return View
         */
        public function getLogin()
        {
                return View::make('user.auth.login');
        }
 
        /**
         * Login action
         * @return Redirect
         */
        public function postLogin()
        {
                $invalid_login = "Please enter a valid User credentials";

                $credentials = array(
                        'email' => Input::get('email'),
                        'password' => Input::get('password')
                );
 
                try
                {
                        $user = Sentry::authenticate($credentials, false) ? Sentry::getUser() : '';
                        $user_access = ($user && $user->hasAccess(['user'])     );
                        
                        if (!$user_access)
                        {
                                return Redirect::route('user.login')->withErrors(array('login' => $invalid_login));
                        }
                        // Log the user in
                        Sentry::login($user, false);
                        return Redirect::route('home');        

                }
                catch(\Exception $e)
                {
                        return Redirect::route('user.login')->withErrors(array('login' => $e->getMessage()));
                }
        }
 
        /**
         * Logout action
         * @return Redirect
         */
        public function getLogout()
        {
                Sentry::logout();
 
                return Redirect::route('user.login');
        }
 
        public function getRegister() {
                 return View::make('user.auth.register');
        }
        public function postRegister() {
                 $validator = new UserRegisterValidator;  
                  if ($validator->passes()) {

                        try
                        {
                                Sentry::getUserProvider()->create(array(
                                        'email'       => Input::get('email'),
                                        'password'    => Input::get('password'),
                                        'first_name'  => Input::get('firstname'),
                                        'last_name'   => Input::get('lastname'),
                                        'activated'   => 1,
                                ));

                                $currentUser  = Sentry::getUserProvider()->findByLogin(Input::get('email'));
                                $userGroup = Sentry::getGroupProvider()->findByName('User');
                                $currentUser->addGroup($userGroup);
                                // Log the user in
                                Sentry::login($currentUser, false);
                                return Redirect::route('home');
                         }
                        catch(\Exception $e)
                        {
                                return Redirect::route('user.register')->withErrors(array('register' => $e->getMessage()));
                        }        

                  }     
                  else {
                        //var_dump($validator->errors->toJson());
                        return Redirect::route('user.register')->withErrors(array('register'=> $validator->errors->toJson()));
                }
        }


}