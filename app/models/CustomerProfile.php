<?php namespace App\Models;

use App\Models\User;
 
class CustomerProfile extends \Eloquent {
 
    protected $table = 'customer_profiles';
 
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
 
}