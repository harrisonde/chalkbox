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
		echo('b');
		switch ($response = Password::remind(Input::only('email')))
		{
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));

			case Password::REMINDER_SENT:
				return Redirect::back()->with('status', Lang::get($response));
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
				# iterate over collection, less token
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
		
					$user->save();
				});
		
				switch ($response)
				{
					case Password::INVALID_PASSWORD:
					break;
					case Password::INVALID_TOKEN:
					break;
					case Password::INVALID_USER:
						echo(Lang::get($response));
						return View::make('password_reset')->with('error', Lang::get($response));
					break;
					case Password::PASSWORD_RESET:
						echo('PASSWORD_RESET');
						//return Redirect::to('/signin');
					break;
				}
			
			}
			else # wait for user to add datat to form
			{
				return View::make('password_reset')->with('token', $token);
			}
			
		
		}
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function update() # postReset();
	{
		echo('d');
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));

			case Password::PASSWORD_RESET:
				return Redirect::to('/');
		}
	}

}
