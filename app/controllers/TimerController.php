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
class TimerController extends \BaseController {
	
	/**
	 * Called each time class is requested
	 *
	 * @return Boolen
	 */
	public function __construct()
    {
       	
       	 # filter as we don't want to reauthenticate
		$this->beforeFilter('auth');
		
		$this->beforeFilter('csrf', array('on' => 'post')); # prevent cross site request forgery
    }
    
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		echo'index';
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		echo'create';
	}


	/**
	 * Store a newly timer request in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	
		
		# start a stopwatch
		$stopWatch = StopwatchFacade::start(Input::get('id'));
		
		# stopwatch will return boolean
		switch($stopWatch)
		{
			case false:
				
				 $error = array('flash_message_error' => 'Something went wrong - please try again, later.');
				 
				 return Redirect::back()->withErrors($error);
				
			break;
			case true:
				
				#Flash message
				Session::flash('flash_message_success', 'Timer Started!');;
	
				return Redirect::back();
				
			break;
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
		echo'show';
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
		echo'edit';
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
		echo'update';
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
		echo'destroy';
	}


}
