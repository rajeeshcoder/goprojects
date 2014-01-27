<?php namespace App\Models;

use App\Models\User;
use App\Models\ServiceCenter;
use App\Models\CustomerVehicle;
use Carbon\Carbon;
use App\Models\CustomerBooking;
 
class CustomerBookingStatus extends \Eloquent {
 
    protected $table = 'customer_bookings_status';
 
 	public function customerbookings()
    {
        return $this->belongsToMany('App\Models\CustomerBooking', 'booking_status', 'customer_booking_status_id', 'customer_booking_id')->withPivot('owner')->withTimestamps();;
    }

}