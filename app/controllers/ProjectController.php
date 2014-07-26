<?php

class ProjectController extends \BaseController {

	/**
	 * Called each time class is requested
	 *
	 * @return Boolen
	 */
	public function __construct()
    {
       
		$this->beforeFilter('auth'); # filter as we don't want to reauthenticate
		
		$this->beforeFilter('csrf', array('on' => 'post')); # prevent cross site request forgery
    }
	
	/**
	 * Display a listing of the projects.
	 *
	 * @return Response
	 */
	public function index()
	{
		# Instantiating an object of the Project class
		$projects = new Project(); 
	
		# Get the projects
		$project = $projects->get_projects();
		
		// Passing Data To View
		return View::make('projects')->with('query', $project);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('project_create');
	}


	/**
	 * The method will store projects.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		// validate data
		# input(s) to validate
		$rules = array( 
			'name'        => 'required|min:1',
			'status'      => 'required|min:1', # might want to be more strict
			);
		
		# Validation message
		$message = array( 
			'name'       => 'Please specify a name for your project.',
			'status'     => 'The project status must be included',
			);
		
		# run validation
		$validator = Validator::make(Input::all(), $rules, $message);
		
		if ( $validator->fails() )
		{
			
			# Validator returns worng format for our flash_message_error method
			$messageObj =  $validator->messages()->toArray(); #named array
			$messageArray = array(); # numberd array
			# iterate named array and push to numberd array
			foreach($messageObj as $key => $value)
			{

				array_push($messageArray, $value[0]);
			}
			
			# Flash the from input sice we return a view, no redirect
			Input::flash();
			
			return View::make('project_create')->with('flash_message_error', $messageArray)->withInput(Input::All());
					
		} 
		elseif( $validator->passes() ) 
		{	
			
			# Instantiating an object of the Project class
			$project = new Project();
			
			# create new project
			$project = $project->create_project(Input::all());
			
			echo 'running store method';
			
			print_r($project);
			# Flash the from input sice we return a view, no redirect
			//Input::flash(); // might not need flash if not returning any inout - chack this! 
			
			// neeed to know if error or success!!!!
			//return View::make('projects')->with('flash_message_error', $messageArray);
		
		}
	
		
	}


	/**
	 * Display the specified project detail, if no project detail found, route back to project list.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		# Instantiating an object of the Project class
		$projects = new Project(); 
	
		# Get the projects
		$project = $projects->get_project_detail($id);
		
		// check id and return view
		switch(sizeof($project))
		{
			case 0:
			
				return View::make('projects');
			
			break;
			
			default:
				
				// Passing Data To View	
				return View::make('projects_details')->with('query', $project);
			
			break;
		}

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		echo 'edit a project';
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		 echo 'update';
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		 echo 'destroy';
	}


}
