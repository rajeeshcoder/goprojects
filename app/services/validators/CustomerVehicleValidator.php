<?php namespace App\Services\Validators;
 
class CustomerVehicleValidator extends Validator {
 
    public static $rules = array(
        'model' => 'required', 
        'reg_no' => 'required',   
    );
 
}