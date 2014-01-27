<?php namespace App\Models;

use App\Models\User;
use App\Models\Model;
use App\Models\CustomerBooking;
use Carbon\Carbon;
 
class CustomerVehicle extends \Eloquent {
 
    protected $table = 'customer_vehicles';
 
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
 
    public function model()
    {
        return $this->belongsTo('App\Models\Model');
    }

    public function customerbookings()
    {
        return $this->hasMany('App\Models\CustomerBooking', 'vehicle_id', 'id');
    }

 	public function setRegDateAttribute($value)
    {
        $this->attributes['regdate'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
    }

	public function getRegDateAttribute($value) {
	   return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
	}
}