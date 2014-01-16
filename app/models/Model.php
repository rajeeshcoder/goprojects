<?php namespace App\Models;
 
class Model extends \Eloquent {
 
    protected $table = 'models';
 
    public function manufacturer()
    {
        return $this->belongsTo('App\Models\Manufacturer');
    }
 
}