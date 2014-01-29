<?php namespace App\Models;

use App\Models\User;
use Carbon\Carbon;
use App\Models\ServiceMaster;
 
class ServiceMasterStatus extends \Eloquent {
 
    protected $table = 'service_master_status';
 
 	public function servicemaster()
    {
        return $this->belongsToMany('App\Models\ServiceMaster', 'service_status', 
        	'service_master_status_id', 'service_master_id')
        	->withPivot('user_id')->withTimestamps();;
    }

}