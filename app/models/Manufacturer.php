<?php namespace App\Models;
 
 use App\Models\Dealer;
 use App\Models\Model;
 use App\Models\ServiceCenter; 

class Manufacturer extends \Eloquent {
 
    protected $table = 'manufacturers';
 
    public function models()
    {
        return $this->hasMany('App\Models\Model');
    }
 
    public function dealers()
    {
        return $this->hasMany('App\Models\Dealer');
    }

    public function customervehicles()
    {
        return $this->hasMany('App\Models\Customer_Vehicle');
    }

    public function servicecenters()
    {
        return $this->hasManyThrough('App\Models\ServiceCenter', 'App\Models\Dealer');
    }

}