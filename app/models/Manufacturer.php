<?php namespace App\Models;
 
 use App\Models\Dealer;
 use App\Models\Model;

class Manufacturer extends \Eloquent {
 
    protected $table = 'manufacturers';
 
    public function model()
    {
        return $this->hasMany('App\Models\Model');
    }
 
     public function dealer()
    {
        return $this->hasMany('App\Models\Dealer');
    }
}