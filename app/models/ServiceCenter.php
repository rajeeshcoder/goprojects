<?php namespace App\Models;

use App\Models\Dealer;
 
class ServiceCenter extends \Eloquent {
 
    protected $table = 'service_centers';
 
    public function dealer()
    {
        return $this->belongsTo('App\Models\Dealer');
    }
 
}