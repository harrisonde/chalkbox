<?php

class SignInController extends \BaseController {

	/**
	 * Called each time class is requested
	 *
	 * @return Boolen
	 */
	public function __construct()
    {
       
		$this->beforeFilter('guest'); # filter as we don't want to reauthenticate
		
		$this->beforeFilter('csrf', array('on' => 'post')); # prevent cross site request forgery
    }

    
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		// Return default from view for user to signin.
		return View::make('signin');
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
	 * Login attempts pass the username and password input values to the Auth::attempt method.
	 *
	 * @return object Response
	 */
	public function store()
	{
				
		if(Auth::attempt(Input::only('email', 'password'))) 
		{
			
			return Redirect::to('projects');			
		} 
		
		else 
		
		{
			# Flash the from input sice we return a view, no redirect
			Input::flash();

			$custom_error_message = array( 'Incorrect username or password.');
			
			return View::make('signin')->with('errors_custom', $custom_error_message)->withInput(Input::only('email'));
	    
	    }
	
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
