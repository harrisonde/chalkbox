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
	 * return array response[status][message]
	 * 200 -> ok
	 * 409 -> error
	 */
	 public function register($userdata){
		 # here we will try and insert the user if the username and email are not duplicated
		 # we do this to stop mulit-registration 
		 # really need to filter this opposed to a second query. 
		 $users = User::where('username', '=', $userdata['username'])->get();
		 
		 # check user name
		 switch(sizeof($users))
		 {
			 case 0: # no username match
			 	$users = User::where('email', '=', $userdata['email'])->get();
			 	if( sizeof($users) == 0 ) # no email match
			 	{
				 	# Instantiating an object of the User class
				 	$new_user = new User();
				 	
				 	# Build table prams
				 	$new_user->username = $userdata['username'];
				 	$new_user->email = $userdata['email'];
				 	$new_user->password =  Hash::make($userdata['password']);
				 	
				 	# Eloquent, do yo thang!
				 	$new_user->save();
				 	
				 	return array( 'response' => array(['200' => 'Good! Please check email to complete registration process ']) );
			 	}
			 	else{
				 	
				 	return array( 'response' => array(['409' => 'Email already in use.']) );
				 	
			 	}
			 break;
			 
			 default;
			 	
			 	return array( 'response' => array(['409' => 'Username already in use.']) );
			 
			 break;
		 }
	 }
}
