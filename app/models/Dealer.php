<?php namespace App\Models;

use App\Models\Manufacturer;
use App\Models\ServiceCenter; 

class Dealer extends \Eloquent {
 
    protected $table = 'dealers';
 
    public function manufacturer()
    {
        return $this->belongsTo('App\Models\Manufacturer');
    }
 
    public function servicecenters()
    {
        return $this->hasMany('App\Models\ServiceCenter');
    }
}