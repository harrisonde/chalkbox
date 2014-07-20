<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Project extends Eloquent {

	/*
	*	The Project class allows for CRUDy modification of the Projects table.
	*/
	
	# Properties...
	public $projects; # Array
	
	# Methods...
	
	
		
	//Create
		
	
	/**
	 * Get all projects in database.
	 *
	 * @return projects
	 */
	public function get_projects(){
		
		$projects = Project::all();
		
		return $projects;
	}
	
	//Update
	//Delete

}
