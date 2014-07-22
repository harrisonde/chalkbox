<?php

class SearchController extends \BaseController {

	/**
	 * Display a search form for the user.
	 *
	 * @return project list
	 */
	public function index($serachString = '')
	{
		// Display the default search form
		return View::make('search');
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
	 * @param  string  $serachString
	 * @return array Projects
	 */
	public function show($serachString)
	{
		$projects = $this->dig($serachString);
			
		// Passing Data To View
		return View::make('search')->with('query', $projects);
			
	}

	
	
	/**
	 * Search the projects table and return the results.
	 *
	 * @param   string  $searchString
	 * @return array projects 
	 */
	private function dig($serachString){		
		
		$results; # array
		
		if($serachString)
		{
			# search for projects with a name that match the search critera supplied by form.
			# this needs to be added into a model, not the controller
			# also might be faster to filter() opposed to running a second eloquent query. 
			# Query results in high CPU / memory usage on the webserver
			# Please take a look at Eloquent Conllections.
			$user_id = Auth::id();
			$projectNames = Project::where('user_id', '=', $user_id)->where('name', 'like', '%' . $serachString  . '%')->get();
			
			# eloquent will return a emoty  array, don't return empty search results - we need a nice message.
			if(sizeof($projectNames) == 0)
			{
				$results = array('error' => 'Sorry, Charlie. I can\'t find any projects that match "'.$serachString.'".');
			}
			else
			{
				$results = $projectNames;	
			}
			
		}
		# do not run empty search agains the db
		else
		{
			$results = array('error' => 'Sorry, Charlie. You must provide search criteria');
		}
		return $results;
	}
}
