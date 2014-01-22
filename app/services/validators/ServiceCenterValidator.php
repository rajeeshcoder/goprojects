<?php namespace App\Services\Validators;
 
class ServiceCenterValidator extends Validator {
 
    public static $rules = array(
        'title' => 'required', 
        'location' => 'required',  
        'city' => 'required',  
        'state' => 'required',   
    );
 
}