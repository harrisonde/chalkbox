<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Project extends Eloquent {

	/*
	*	The Project class allows for CRUDy modification of the Projects table and related data
	*/
	
	# Properties...
	public $projects; # Array
	
	# Methods...
		
	//Create
	
	//Read
	get_projects(){
		
		dd(Project::all());	
	
	}
	//Update
	//Delete

}
