<?php
/**
*
* The note model allows for store of note to db for record keeping.
*
*/
class Note extends Eloquent{
	/**
	* Add note to the notes table
	* 
	* @param array Content, Project ID, and User ID
	* @ return string Success or Error
	*/
	public function postNote($request)
	{
	
		
		 # Instantiate the model
		 $note = new Note();
		
		 # Note
		 $note->content = $request['content']; 
		 $note->title = $request['title']; 
		 $note->project_title = $request['project_title'];
		 $note->project_id = $request['project_id'];
		 $note->user_id = $request['user_id'];
		 
		 try
		 {
			$note->save(); 
			
			return 'success';
			
		 }
		 catch(Exception $e)
		 {
			
			return 'error';	 
			 
		 }
	}
	/**
	* Get a notes by project_id from notes table
	* 
	* @param array Note ID
	* @ return note
	*/
	public function getNote($id)
	{
		# Instantiate the model
		$notes = Note::where('id', '=', $id)->get()->toArray();
		
		return $notes;
		
	}
	/**
	* Get all notes by project_id from notes table
	* 
	* @param array Project ID
	* @ return string Success or Error
	*/
	public function getAllNotes($project_id)
	{
		# Instantiate the model
		$notes = Note::where('project_id', '=', $project_id)->get()->sortBy('created_at')->toArray();
		
		return $notes;
		
	}
}	