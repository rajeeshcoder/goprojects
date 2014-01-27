<?php namespace App\Models;

use App\Models\Dealer;
use App\Models\CustomerBooking;
 
class ServiceCenter extends \Eloquent {
 
    protected $table = 'service_centers';
 
    public function dealer()
    {
        return $this->belongsTo('App\Models\Dealer');
    }
 
    public function customerbookings()
    {
        return $this->hasMany('App\Models\CustomerBooking', 'service_center_id', 'id');
    }
 
}