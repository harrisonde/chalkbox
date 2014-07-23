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
	 */
	 public function register($userdata){
		# here we will try and insert the user if the username and email are not duplicated
		# we do this to stop mulit-registration 
		# really need to filter this opposed to a second query. 
		
		# parse user name from email
		$username = explode('@', $userdata['email']);
		
		# Instantiating an object of the User class
		$new_user = new User();
		
		# Build table prams
		$new_user->username = $username[0];
		$new_user->email = $userdata['email'];
		$new_user->password = Hash::make($userdata['password']);
		$new_user->remember_token = $userdata['_token'];
		
		# Eloquent, do yo thang!
		$new_user->save();
		
	 }
}
