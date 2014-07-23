<?php

class RegisterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Return default form view for registration
		
		return View::make('register');
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
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	
		# input(s) to validate
		$rules = array( 
			'password' => 'required|min:8',
			'email' => 'required|email|unique:users'
			);
		
		# Validation message
		$message = array( 
			'password' => 'You are going to need a stronger password!',
			'email.unique' => 'That email is already used.'
			);
		
		# run validation
		$validator = Validator::make(Input::all(), $rules, $message);
		
		if ( $validator->fails() )
		{
			# return to view with error messages        
        	return View::make('register')->withErrors( $validator->messages() );
		
		} 
		elseif( $validator->passes() ) 
		{		
			# Instantiating an object of the User class
			$user_new = new User(); 
		
			# add new user to db
			$user_new = $user_new->register( Input::all() );
			
			# email @prams
			$name = 'emails/auth/register'; # (string) email template
			$data = array('email' => Input::get('email'), ); #data that you want to make available to your email, same as passing data to a view.
			
			# Add email to background queue so the registration page will not hang
			Mail::queue($name, $data, function($message) 
			{
		    	$message->to('harrison.destefano@gmail.com', 'Harrison')
		    	->subject('Welcome!');
			});
			
			return View::make('register')->with('query', $user_new);
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
