<?php namespace App\Controllers\Customer;
 
use App\Services\Validators\CustomerRegisterValidator; 
use Auth, BaseController, Form, Input, Redirect, Sentry, View;
 
class AuthController extends BaseController {
 
        /**
         * Display the login page
         * @return View
         */
        public function getLogin()
        {
                return View::make('customer.auth.login');
        }
 
        /**
         * Login action
         * @return Redirect
         */
        public function postLogin()
        {
                $invalid_login = "Please enter a valid Customer credentials";

                $credentials = array(
                        'email' => Input::get('email'),
                        'password' => Input::get('password')
                );
 
                try
                {
                        $customer = Sentry::authenticate($credentials, false) ? Sentry::getUser() : '';
                        $customer_access = ($customer && $customer->hasAccess(['customer'])     );
                        
                        if (!$customer_access)
                        {
                                return Redirect::route('customer.login')->withErrors(array('login' => $invalid_login));
                        }
                        // Log the customer in
                        Sentry::login($customer, false);
                        return Redirect::route('home');        

                }
                catch(\Exception $e)
                {
                        return Redirect::route('customer.login')->withErrors(array('login' => $e->getMessage()));
                }
        }
 
        /**
         * Logout action
         * @return Redirect
         */
        public function getLogout()
        {
                Sentry::logout();
 
                return Redirect::route('customer.login');
        }
 
        public function getRegister() {
                 return View::make('customer.auth.register');
        }
        public function postRegister() {
                 $validator = new CustomerRegisterValidator;  
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

                                $currentCustomer  = Sentry::getUserProvider()->findByLogin(Input::get('email'));
                                $customerGroup = Sentry::getGroupProvider()->findByName('Customer');
                                $currentCustomer->addGroup($customerGroup);
                                // Log the customer in
                                Sentry::login($currentCustomer, false);
                                return Redirect::route('home');
                         }
                        catch(\Exception $e)
                        {
                                return Redirect::route('customer.register')->withErrors(array('register' => $e->getMessage()));
                        }        

                  }     
                  else {
                        //var_dump($validator->errors->toJson());
                        return Redirect::route('customer.register')->withErrors(array('register'=> $validator->errors->toJson()));
                }
        }


}