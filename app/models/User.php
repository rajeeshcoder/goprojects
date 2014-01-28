<?php namespace App\Models;

use Eloquent;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use App\Models\CustomerProfile;

class User extends \Cartalyst\Sentry\Users\Eloquent\User implements UserInterface, RemindableInterface {

        /**
         * The database table used by the model.
         *
         * @var string
         */
        protected $table = 'users';

        /**
         * The attributes excluded from the model's JSON form.
         *
         * @var array
         */
        protected $hidden = array('password');

        /**
         * Get the unique identifier for the user.
         *
         * @return mixed
         */
        public function getAuthIdentifier()
        {
                return $this->getKey();
        }

        /**
         * Get the password for the user.
         *
         * @return string
         */
        public function getAuthPassword()
        {
                return $this->password;
        }

        /**
         * Get the e-mail address where password reminders are sent.
         *
         * @return string
         */
        public function getReminderEmail()
        {
                return $this->email;
        }

        public function customerprofiles()
        {
                return $this->hasMany('App\Models\CustomerProfile');
        }

        public function servicecenters()
        {
        return $this->belongsToMany('App\Models\ServiceCenter', 'user_service', 
                'user_id', 'service_center_id')->withTimestamps();;
        }


}