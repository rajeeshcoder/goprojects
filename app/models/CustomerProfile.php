<?php namespace App\Models;

use App\Models\User;
use App\Models\CustomerBooking;
 
class CustomerProfile extends \Eloquent {
 
    protected $table = 'customer_profiles';
 
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
 
 	public function customerbookings()
    {
        return $this->hasMany('App\Models\CustomerBooking');
    }

}