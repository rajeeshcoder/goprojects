<?php namespace App\Services\Validators;
 
class ManufacturerValidator extends Validator {
 
    public static $rules = array(
        'title' => 'required',        
    );
 
}