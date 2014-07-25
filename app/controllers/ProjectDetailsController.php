<?php

class ProjectDetailsController extends \BaseController {
	
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
	 * Route back to porjects, do not call directly.
	 *
	 * @return project view ie list
	 */
	public function index($id = '1')
	{
		
		return View::make('projects');
	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

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
	}

}
