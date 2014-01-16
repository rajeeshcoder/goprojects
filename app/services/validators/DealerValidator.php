<?php namespace App\Services\Validators;
 
class DealerValidator extends Validator {
 
    public static $rules = array(
        'title' => 'required',        
    );
 
}