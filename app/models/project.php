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
        
        // Get use id to link this project
        $project->user_id = Auth::id();
        
       try
        {
	        # Magic: Eloquent
	        $project->save();
	        
	        #Timer
	        $timer = new Timer();
        
	        # no, tracking time is not started
	        $timer->track = false;
	        
	        # time is kept in seconds
	        $timer->time_elapsed_total = 00;
	       
	        $timer->time_elapsed_start = 00;
	       
	        $timer->time_elapsed_end = 00;
	        
	        #keep track of the project pk as fk
	        $timer->project_id = $project['id'];
	        
	         try
			 {
	         	# Magic: Eloquent
			 	$timer->save();
			 	
				 	# Action
				 	$action = new Action();
				 	//type			 	
				 	$action->type = 'created';
					//description 
					$action->description = 'Created new project, '. $projectDetail['name'] .'.';
					//projec id 
					$action->project_id = $project->id;
					//user id
					$action->user_id = $project->user_id;
					# Magic: Eloquent
				 	$action->save();
				 	
				 	# Retuen a message
			        //$success = array('flash_message_success', array('Project created.') );
					$success = array('flash_message_success ' => 'Project created.', 'project_id' => $project->id);
					
				return $success;
	        
	         }
	         # Fail
			 catch (Exception $e)
			 { 
				 
		 		$error = array('flash_message_error' => 'Something went wrong - please try again, later.');
			
		 		return $error;	    
		     
		     } 
	  
		}
		# Fail
		catch (Exception $e)
	    { 
			 
	 		$error = array('flash_message_error' => 'Something went wrong - please try again, later.');
		
	 		return $error;	    
	     
	    } 
	
	}
	
	/**
	 * Get all projects in database related to the current user.
	 *
	 * @return projects
	 */
	public function get_projects()
	{
		
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
	public function get_project_detail($id)
	{
		
		# eloquent query for project
		$projectDetail = Project::find($id);
		
		# return the results, only the attibutes
		return $projectDetail['attributes'];
	}
	
	/**
	 * Update specific project in database.
	 *
	 * @pram array project colums
	 * @pram int project id
	 * @return array Response
	 */
	public function update_project($projectDetail, $id)
	{
	
        # Get a project to update
        $project = Project::find($id);
		
		// set project description
        $project->description = $projectDetail['description'];
        
        // set project status
        $project->status = $projectDetail['status'];
        
        // set project start date
        $project->date_start = $projectDetail['date_start'];
        
        // set project end date
        $project->date_end = $projectDetail['date_end'];
		
		# Action
	 	$action = new Action();
	 	//type			 	
	 	$action->type = 'Updated';
		//description 
		$action->description = 'Updated project, '. $project['name'] .'.';
		//projec id 
		$action->project_id = $project->id;
		//user id
		$action->user_id = $project->user_id;

		
		try{	
			
			# Updating the retrieved model
			$project->save();	
			
			# Magic: Eloquent
			$action->save();
			
		}
		
		catch(Exception $e){
						
		 	return $error;	 
		}	
	}	
	//Delete

}
