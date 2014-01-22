<?php namespace App\Models;

use App\Models\User;
use App\Models\ServiceCenter;
use App\Models\CustomerVehicle;
use Carbon\Carbon;
 
class CustomerBooking extends \Eloquent {
 
    protected $table = 'customer_bookings';
 
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
 
 	 public function servicecenter()
    {
        return $this->belongsTo('App\Models\ServiceCenter');
    }

     public function customervehicle()
    {
        return $this->belongsTo('App\Models\CustomerVehicle');
    }

    public function setServiceDateAttribute($value)
    {
        $this->attributes['servicedate'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
    }

    public function getServiceDateAttribute($value) {
       return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }
}