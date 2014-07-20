<?php

class ProjectController extends \BaseController {

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
		//
	}


	/**
	 * The method will store projects.
	 *
	 * @return Response
	 */
	public function store()
	{
				
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
