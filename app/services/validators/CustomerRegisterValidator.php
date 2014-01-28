<?php namespace App\Services\Validators;
 
class CustomerRegisterValidator extends Validator {
 
    public static $rules = array(
        'firstname'=>'required|alpha|min:2',
   		'lastname'=>'required|alpha|min:2',
   		'email'=>'required|email|unique:users',
   		'password'=>'required|alpha_num|between:6,12|confirmed',
   		'password_confirmation'=>'required|alpha_num|between:6,12'        
    );
 
}