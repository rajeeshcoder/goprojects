<?php namespace App\Controllers\Customer;
 
use App\Services\Validators\CustomerRegisterValidator; 
use Auth, BaseController, Form, Input, Redirect, Sentry, View, Mail;
 
class AuthController extends BaseController {
 
        /**
         * Display the login page
         * @return View
         */
        public function getLogin()
        {
             if ( ! Sentry::check()) {
                 return View::make('customer.auth.login');
            }
            else {
                 return Redirect::route('home');
            }


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
            if ( ! Sentry::check()) {
                 return View::make('customer.auth.register');
            }
            else {
                 return Redirect::route('home');
            }

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
                                Mail::send('customer.mail.welcome', array('firstname'=>Input::get('firstname')), function($message){
        $message->to(Input::get('email'), Input::get('firstname').' '.Input::get('lastname'))->subject('Welcome to the DashWheel!');
    });
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