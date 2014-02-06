<?php namespace App\Models;

use App\Models\User;
use Carbon\Carbon;
use App\Models\ServiceMasterStatus;

class ServiceMaster extends \Eloquent {
 
    protected $table = 'service_master';

    public static function boot()
    {
        parent::boot();

        static::created(function($service)
        {
            $service->servicemasterstatus()->attach(1, array( 
            			'user_id' => $service->user_id));
        });
        static::updated(function($booking)
        {
            //$booking->customerbookingstatus()->attach(1, array('owner' => 's', 'user_id' => "$booking->user_id"));
           // $post->created_by = Auth::user()->id;
           // $post->updated_by = Auth::user()->id;
        });
    }
 
    public function booking()
    {
        return $this->belongsTo('App\Models\CustomerBooking', 'booking_id', 'id');
    }
   
    public function servicemasterstatus()
    {
        return $this->belongsToMany('App\Models\ServiceMasterStatus', 
            'service_status', 'service_master_id', 'service_master_status_id')
                    ->withPivot('user_id')->withPivot('description')->withTimestamps();
    } 
}