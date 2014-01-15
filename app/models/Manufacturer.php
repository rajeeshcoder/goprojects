<?php namespace App\Models;
 
class Manufacturer extends \Eloquent {
 
    protected $table = 'manufacturers';
 
    public function model()
    {
        return $this->hasMany('Model');
    }
 
}