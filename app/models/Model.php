<?php namespace App\Models;
 
class Model extends \Eloquent {
 
    protected $table = 'model';
 
    public function manufactuerer()
    {
        return $this->belongsTo('Manufacturer');
    }
 
}