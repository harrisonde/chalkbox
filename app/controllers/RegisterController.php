<?php


class RegisterController extends \BaseController {

	
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
	 * Store a newly created user.
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
			$model_response = $user_new->register( Input::all() );
	
			switch($model_response)
			{
				# send welcome email, login, navigate to /projects
				case true:
					# email @prams
					# (string) email template
					$name = 'emails/auth/register';
					#data that you want to make available to your email, same as passing data to a view.
					$data = array('email' => Input::get('email') ); 					
					# Add email to background queue so the registration page will not hang
					Mail::queue($name, $data, function($message) 
					{
				    	$message->to( Input::get('email'), Input::get('email') )->subject('Welcome to Chalkbox!');
					});
					#get user email and look up id
					$query_for_id = $user_new::where('email', '=', Input::get('email'))->get();
					
					# Manually Logging In Users
					$query_for_id->filter(function($query_for_id)
					{
						
						# Seed the users first project 
						$this->ProjectTableSeed($query_for_id->id);
						
						# Auto-login
						Auth::loginUsingId( $query_for_id->id);
					
					});
					
					#Flash message
					Session::flash('flash_message_success', 'Welcome to Chalkbox.');
					
					# redirect to signin view, prefill email.
					return Redirect::to('/projects');
					
				break;
				case false:
					
					# return to view with error messages        
					return View::make('register')->withErrors(['Oops. Please try again.']);
				
				break;
			}
			
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
	
	/**
	 * Run the database seeds adding project for a default user.
	 *
	 * @return string
	 */
    public function ProjectTableSeed($user)
    {

    	# Instantiate the projet model	
    	$project = new Project();
        
        # Build seed data
        // set project name
        $project->name = 'Chalkbox Welcome';
        
        // set project description
        $project->description = 'Get to know Chalkbox.';
        
        // set project status
        $project->status = 'Open';
        // set project start date
        $project->date_start = '1982-03-16';
        
         // set project end date
        $project->date_end = '0-0-0';
        
        // Get use id to link this project
        $project->user_id = $user;
        
        # Magic: Eloquent
        $project->save();
        
        $timer = new Timer();
        
        # no, tracking time is not started
        $timer->track = false;
        
        # time is kept in seconds
        $timer->time_elapsed_total = 00;
       
        $timer->time_elapsed_start = 00;
       
        $timer->time_elapsed_end = 00;
        
        #keep track of the project pk as fk
        $timer->project_id = $project['id'];
        
         # Magic: Eloquent
        $timer->save();

    }

}
