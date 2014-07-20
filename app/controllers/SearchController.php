<?php

class SearchController extends \BaseController {

	/**
	 * Display a listing of the projects by serach critera.
	 *
	 * @return project list
	 */
	public function index()
	{
		#Properties
		$serachString = Input::get('search');
		
		if($serachString){
			
			echo('Alright, I might do that for you. One second.');
		}
		else
		{
			echo('Sorry, Charlie. You must provide search criteria');
		}

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
	 * Method will search for projects by critera captured by search form.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$projects = $this->dig(Input::get('search'));
			
		// Passing Data To View
		return View::make('search')->with('query', $projects);

	}


	/**
	 * Search for projects and display the resources.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
			
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

	/**
	 * Search the projects table and return the results.
	 *
	 * @param   string  $searchString
	 * @return projects 
	 */
	private function dig($serachString){		
		
		$needles; # array
		
		if($serachString)
		{
			
			$needles = array('Alright, I might do that for you. One second.');
		}
		else
		{
			$needles = array('Sorry, Charlie. You must provide search criteria');
		}
		return $needles;
	}
}
