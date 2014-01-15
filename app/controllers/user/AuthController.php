<?php namespace App\Controllers\User;
 
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
                        $user_access = ($user && $user->hasAccess(['user']));
                        
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
 
}