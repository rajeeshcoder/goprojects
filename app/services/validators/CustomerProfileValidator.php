<?php namespace App\Services\Validators;
 
class CustomerProfileValidator extends Validator {
 
    public static $rules = array(
        'title' => 'required', 
        'primary_phone' => 'required', 
        'address' => 'required',   
        'city' => 'required',  
        'state' => 'required',   
    );
 
}