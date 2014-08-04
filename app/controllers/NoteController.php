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
class NoteController extends \BaseController {
	
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
	 * Store a newly note request in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	
		
		# instantiate	
		$note = new Note();
		
		$note = $note->postNote(['content'=>Input::get('content'), 'title' => Input::get('title'), 'project_id'=>Input::get('id'), 'project_title'=> Input::get('project_title'),'user_id'=> Auth::id()]);
		
		# method returns success or error
		if($note == 'error')
		{
				

			# PK
			return Redirect::to('projects/'. Input::get('id'))->withErrors('Error saving note. Please try again')->withInput();		
			
		}
		else
		{
			#Flash message
			Session::flash('flash_message_success', 'Note created!');
			
			return Redirect::to('projects/'. Input::get('id'));
			
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
	 * @return Json
	 */
	public function edit($id)
	{
		
		# Instantiating an object of the Note class
		$note = new Note();
		$note = $note->getNote($id);
		
		if(sizeof($note) == 0)
		{
			$note = ['Error' => 'No note. Please try again.'];
		}
		
		#return
		return $note;
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
		echo 'update';
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
