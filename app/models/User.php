<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

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
	protected $hidden = array('password', 'remember_token');
	/**
	 * Add a user to the database, thow error if not unique
	 * @pram named array $userdata['username'], $userdata['email']
	 * 
	 * @response boolean true/false
	 */
	public function register($userdata){
		
		# parse user name from email
		$username = explode('@', $userdata['email']);
		
		# Instantiating an object of the User class
		$new_user = new User();
		
		# Build table prams
		$new_user->username = $username[0];
		$new_user->email = $userdata['email'];
		$new_user->password = Hash::make($userdata['password']);
		$new_user->remember_token = $userdata['_token'];
		
		# Try to add the user 
		try {    
		    # Eloquent, do yo thang!
			$new_user->save();
			
		}
		# Fail
		catch (Exception $e) {
		
		 	# bounce back to register with an error.  
		 	return false;
		}
		
		# All is well in the world
		return true;
	}
}
