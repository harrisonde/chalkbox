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
	
	
		
	/**
	 * Create aprojects in database related.
	 * @pram Array
	 *
	 * @return Response
	 */
    public function create_project($projectDetail)
    {
    	
		# Instantiate the projet model	
    	$project = new Project();
       	 
        # Build seed data
        // set project name
        $project->name = $projectDetail['name'];
        
        // set project description
        $project->description = $projectDetail['description'];
        
        // set project status
        $project->status = $projectDetail['status'];
        
        // set project start date
        $project->date_start = $projectDetail['date_start'];
        
         // set project end date
        $project->date_end = $projectDetail['date_end'];
        
        // Total time in seconds
        $project->time_elapsed_total = 00;
        
        // Elapsed start time in seconds
        $project->time_elapsed_start = 00;
        
        // Tracking time?
        $project->time_elapsed_track = false;
        
        // Get use id to link this project
        $project->user_id = Auth::id();
        
        try
        {
	        # Magic: Eloquent
	        $project->save();
	     
	        # Retuen a message
	        //$success = array('flash_message_success', array('Project created.') );
			$success = array('flash_message_success ' => 'Project created.', 'project_id' => $project->id);
			
			return $success;
		}
		
		# Fail
		catch (Exception $e)
		{
		
			$error = array('flash_message_error' => 'Oops. Try again.');
			
			return $error;		
		}
	
	}
	
	/**
	 * Get all projects in database related to the current user.
	 *
	 * @return projects
	 */
	public function get_projects(){
		
		$user_id = Auth::id(); #string
		
		$projects = Project::where('user_id', '=', $user_id)->get();
		
		return $projects;
	}
	
	/**
	 * Get specific project detail in database.
	 *
	 * @pram string project ID
	 * @return array project detail
	 */
	public function get_project_detail($id){
		
		# eloquent query for project
		$projectDetail = Project::find($id);
		
		# return the results, only the attibutes
		return $projectDetail['attributes'];
	}
	
	//Update
	//Delete

}
