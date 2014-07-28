<?php
/*
 *  Actions Handled By Resource Controller
 *	
 *	|Verb	   | Path	                   | Action	 | Route Name          |
 *  |----------| ------------------------- |---------|---------------------| 
 *	|GET	   | /resource	               | index	 | resource.index      |
 *	|GET	   | /resource/create	       | create	 | resource.create     |
 *	|POST	   | /resource	               | store	 | resource.store      |
 *	|GET       | /resource/{resource}	   | show	 | resource.show       |
 *	|GET       | /resource/{resource}/edit | edit	 | resource.edit       |
 *	|PUT/PATCH | /resource/{resource}	   | update	 | resource.update     |
 *	|DELETE	   | /resource/{resource}	   | destroy | resource.destroy    |
 *
*/
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
			'date_start'  => 'date',
			'date_end'    => 'date',
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
			
			return View::make('project_create')->withErrors($messageArray)->withInput(Input::All());
					
		} 
		elseif( $validator->passes() ) 
		{	
			
			# Instantiating an object of the Project class
			$project = new Project();
			
			# create new project
			$project = $project->create_project(Input::all());
		
			# return to projects
			if(isset($project['flash_message_error']))
			{
				 return View::make('projects')->withErrors($project)->withInput(Input::All());
			}
			# project details view
			else
			{
				#get project id
				$project_id = $project['project_id'];
				
				#Flash message
				Session::flash('flash_message_success', 'Project created!');

				# PK
				return Redirect::to('projects/'. $project_id)->with('query', $project);	
			}
		
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
		
		# instantiate 
		$project = new Project();
		
		# query
		$project = $project->get_project_detail($id);
		
		#return
		return View::make('project_edit')->with('query', $project);
	}
	/**
	 * Show a form to edit a project.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editSetting($id)
	{
		# instantiate 
		$project = new Project();
		
		# query
		$project = $project->get_project_detail($id);
		
		#return
		return View::make('project_settings')->with('query', $project);
	}
	/**
	 * Update the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editSettingName($id)
	{
		# Project
		# instantiate 
		$project = new Project();
		
		# query
		$project = $project->find(Input::get('id'));
				
		$project->name = Input::get('name');
		
		#try and save 
		try{
			
			$project->update();	
			
			# Flash message
			Session::flash('flash_message_success', 'Project name updated!');
			
			return Redirect::to('projects/'. Input::get('id') );
		}
		#fail
		catch (Exception $e) 
		{
			# return back with message
			return Redirect::back()->withErrors( $project_stamp['validation'] );
		}
		
	
		

	
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		 
		 $project_stamp = $this->stampIt(Input::all(), $id);
		 
		 
		 # fail
		if($project_stamp['stamped'] == false){
			
			# return back with message
			return Redirect::back()->withErrors( $project_stamp['validation'] );	
		}
		# pass
		else
		{
			# Flash message
			Session::flash('flash_message_success', 'Project Updated!');
			
			return Redirect::to('projects/'. $id);
			
		}
		
	}
	/**
	 * Helper method to store a project in the database ... will need to adjust for use with "store" and "update"
	 *
	 * @param  array $inputAll
	 * 
	 * @return array Boolean, Validation Message(s) 
	 */
	private function stampIt($inputAll, $id)
	{
		// validate data
		# input(s) to validate
		$rules = array( 
    			'status'      => 'required|min:1', # might want to be more strict
    			'date_start'  => 'date',
				'date_end'    => 'date',
			);
		
		# Validation message
		$message = array( 
				'status'     => 'The project status must be included',
			);
		
		# run validation
		$validator = Validator::make($inputAll, $rules, $message);
		
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
			
			# return the response	
			return array( 'stamped' => false, 'validation' => $messageArray);
					
		} 
		elseif( $validator->passes() ) 
		{	
			#save
			# Instantiating an object of the Project class
			$project = new Project();
			
			# query and save model
			$project = $project->update_project($inputAll, $id);
			
						
			# return the response
			$messageArray = array('Updated.');
			return array( 'stamped' => true, 'validation' => $messageArray); 		
		}
	
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		# Project
		# instantiate 
		$project = new Project();
		
		# query
		$project = $project::find($id);
		
		# delete
		$project->delete();
		
		#timer
		# instantiate 
		$timer = new Timer();
		
		# query
		$timer = $timer::find($id);
		
		# delete
		$timer->delete();
		
		# Get the projects
		$project = $project->get_projects();
		
		#Flash message
		Session::flash('flash_message_success', 'Project deleted.');
				
		#return
		return View::make('projects')->with('query', $project);
	}

}
