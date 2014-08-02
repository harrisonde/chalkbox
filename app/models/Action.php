<?php
/**
*
* The action model allows for passing system actions to db for record keeping.
*
*/
class Action extends Eloquent{
	/**
	* Add action to the actions table
	* 
	* @param array Type, Description, Project ID, and User ID
	* @ return string Success or Error
	*/
	public function postAction($action)
	{
	
		# Instantiate the model
		$action = new Action();
		
		 # Build seed data
		 //type 
		 $action->type = $action['type'];
		 //description 
		 $action->description = $action['description'];
		 //projec id 
		 $action->project_id = $action['project_id'];
		 //user id
		 $action->user_id = $action['user_id'];
		 
		 try
		 {
			$action->save; 
			
			return 'Success';
			
		 }
		 catch(Exception $e)
		 {
			
			return 'Something went totally wrong - please try again.';	 
			 
		 }
	}
	
	/**
	* Get action(s) from the actions table by project id and number of actions
	* 
	* @param array Project ID, number of actions.
	* @ return array Project Name, Action Detail, Carbon Time
	*/
	public function getAction($request)
	{	
		# Lazy Eager Loading
		$action = Action::all();
		
		# Actions to be returned
		$return_actions = array(); # array
		
		# iterate count
		$counter = 0;
		
		# Actions 
		$actions = array(); # array
		
		# iterate Action collection until number of actions is met of EOL
		foreach($action as $action_detail)
		{
			# push matches
			if($counter < $request['actions'] && $request['project_id'] == $action_detail['project_id'] ){
				
				# action detail
				$action_desc = $action_detail['description']; #string
				
				# action date
				$action_date = $action_detail['created_at']; #string

				#project name
				$project_name = Project::find($action_detail['project_id'])['name']; #string
				
				# add item to action array
				array_push($return_actions, ['project' => $project_name, 'detail' => $action_desc, 'date'=>$action_date]);
				
				$counter = $counter + 1;
			}
		}
		
		# return 
		return $return_actions;			
	}

	/**
	* Get actions from the actions table by project id
	* 
	* @param array Project ID
	* @ return array Project Name, Action Detail, Carbon Time
	*/
	public function getAllActions($request)
	{	
		# Lazy Eager Loading
		$action = Action::all();
		
		# Actions to be returned
		$return_actions = array(); # array
	
		# Actions 
		$actions = array(); # array
		
		# iterate Action collection until number of actions is met of EOL
		foreach($action as $action_detail)
		{
			# push matches
			if($request['project_id'] == $action_detail['project_id'] ){
				
				# action detail
				$action_desc = $action_detail['description']; #string
				
				# action date
				$action_date = $action_detail['created_at']; #string

				#project name
				$project_name = Project::find($action_detail['project_id'])['name']; #string
				
				# add item to action array
				array_push($return_actions, ['project' => $project_name, 'detail' => $action_desc, 'date'=>$action_date]);
				
			}
		}
		
		# return 
		return $return_actions;			
	}	
}