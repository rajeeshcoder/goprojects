<?php namespace App\Models;

use App\Models\Manufacturer;
 
class Dealer extends \Eloquent {
 
    protected $table = 'dealers';
 
    public function manufacturer()
    {
        return $this->belongsTo('App\Models\Manufacturer');
    }
 
}