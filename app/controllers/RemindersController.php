<?php

class RemindersController extends Controller {

	#RESTful 
	
	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function index() #getRemind()
	{
		
		return View::make('password_remind');			
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function store() # postRemind()
	{

		switch ($response = Password::remind(Input::only('email')))
		{
			case Password::INVALID_USER:
				return View::make('password_remind')->with('flash_message_error', (array) Lang::get($response));

			case Password::REMINDER_SENT:
				return View::make('password_remind')->with('flash_message_success', (array) Lang::get($response));
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function show($token = null) # getReset();
	{
		
		$credentials = Input::only('email', 'password', 'password_confirmation', 'token');
		$process_reset_request = false; #boolean 
		
		# redirct to root of no token
		if (is_null($token) || $token == 'reset'){
			return Redirect::to('/');
		}
		# token 
		else{
			
			 # credentials have values
			foreach($credentials as $key => $value)
			{
				# iterate over collection, less token, confirm all fields contain input
				if($key != 'token' && empty($value) == false)
				{
					$process_reset_request = true;
				}
			}
			
			# check need to process form
			if($process_reset_request == true) # process password reset request
			{
				# Handle a POST request to reset a user's password.
				$response = Password::reset($credentials, function($user, $password)
				{
					$user->password = Hash::make($password);
					
					#try and save 
					try{
						
						$user->save();	
					}
					
					#fail
					catch (Exception $e) 
					{
						return Redirect::to('/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
					}
					
				});
				
				# Need to clean up this logic - works for now.
				switch ($response)
				{
					case Password::INVALID_PASSWORD:
						return View::make('password_reset')->with('flash_message_error', (array) Lang::get($response));
					break;
					case Password::INVALID_TOKEN:
						return View::make('password_reset')->with('flash_message_error', (array) Lang::get($response));
					break;
					case Password::INVALID_USER:
						return View::make('password_reset')->with('flash_message_error', (array) Lang::get($response));
					break;
					case Password::PASSWORD_RESET:
						
						# Must use flash to pass
						Session::put('flash_message_success', 'Password reset. Please sign-in.');
												
						return Redirect::to('/signin')->with('flash_message_success');
					
					break;
				}
			
			}
			else # wait for user to add data to form
			{
				return View::make('password_reset')->with('token', $token);
			}	
		
		}
	}

	/**
	 * Not in use.
	 *
	 * @return Response
	 */
	public function update() # postReset();
	{
		
	}

}
