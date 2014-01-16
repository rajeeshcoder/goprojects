<?php namespace App\Services\Validators;
 
class ModelValidator extends Validator {
 
    public static $rules = array(
        'title' => 'required',        
    );
 
}