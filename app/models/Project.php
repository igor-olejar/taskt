<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Project extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'projects';
        
        public function user()
        {
            return $this->belongsTo('User');
        }
        
        public function client()
        {
            return $this->belongsTo('Client');
        }
        
        public function tasks()
        {
            return $this->hasMany('Task');
        }

}
