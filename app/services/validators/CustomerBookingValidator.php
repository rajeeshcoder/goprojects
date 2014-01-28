<?php namespace App\Services\Validators;
 
class CustomerBookingValidator extends Validator {
 
    public static $rules = array(
        'servicedate' => 'required', 
        'service_type' => 'required',   
    	'service_dispatch' => 'required',   
    );
 
}