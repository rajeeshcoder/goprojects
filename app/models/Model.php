<?php namespace App\Models;
 
class Model extends \Eloquent {
 
    protected $table = 'models';
 
    public function manufacturer()
    {
        return $this->belongsTo('App\Models\Manufacturer');
    }
 
    public function customervehicles()
    {
        return $this->hasMany('App\Models\CustomerVehicle');
    }
}