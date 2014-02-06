<?php namespace App\Models;

use App\Models\Model;

class PartMaster extends \Eloquent {
 
    protected $table = 'parts_master';
 
    public function model()
    {
        return $this->belongsTo('App\Models\Model');
    }
 
}