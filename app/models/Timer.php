<?php

/**
* The Timer model is a reference to the Timers database table. Albeit
* getters and setters by convention are named "timer" is ubiquitous.
* Thus a facade, "Stopwatch" is created.
* 
* This class is called:
* Stopwatch::@method();
*
*/

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Timer extends Eloquent {
	

	# Properties...
	public $timers; # Array
	
	
	# Methods... 
	/**
	* Set the currect server time as timer start data in database 
	* 
	* @pram projectID
	* @response Boolean True/False
	*/
	public function start($projectID)
	{
		
		#save
		# Instantiating an object of the Timer class and query
		$timer = Timer::find($projectID);
		
		# set Time options
		$timer->time_elapsed_start = date('Y-m-d H:i:s');
		$timer->track = true;
		
		# get Project name
		$project = Project::where('id', '=', $projectID)->get()->toArray();
		
		
		# create Action
	 	$action = new Action();		 	
	 	$action->type = 'Updated';
	 	
	 	
		
		$action->description = $project[0]['name'] . ', Stopwatch started';
		$action->model = 'time';
		$action->project_id = $projectID;
		$action->user_id = Auth::id();
		
		#try and save 
		try{
			
			# Magic: Eloquent
			$timer->save();	
			$action->save();

			return true;
			
		}
		#fail
		catch (Exception $e) 
		{
			return false;
		}
		
	}

	/**
	* Set the total seconds bewteen two datas and store in database. 
	* 
	* @pram projectID
	* @response Boolean True/False
	*/
	public function stop($projectID)
	{
	
		# Instantiating an object of the Timer class and query
		$timer = Timer::find($projectID);
		
		# Time var(s)
		$time_current = date('Y-m-d H:i:s'); #array
		$time_store_start = $timer['time_elapsed_start']; #string
		$time_store_total = $timer['time_elapsed_total']; #string
		$time_total = (strtotime($time_current) - strtotime($time_store_start)) + $time_store_total;
		
		# get Project name
		$project = Project::where('id', '=', $projectID)->get()->toArray();
		
		# set Timer		
		$timer->track = false;
		$timer->time_elapsed_end = $time_current;
		$timer->time_elapsed_total = $time_total;
		
		# set Action
	 	$action = new Action();		 	
	 	$action->type = 'Updated'; 
		$action->description = $project[0]['name'] . ', Stopwatch stopped';
		$action->model = 'time-stop';
		$action->project_id = $projectID;
		$action->user_id = Auth::id();
		
		#try and save 
		try{		
			
			# save
			$timer->save();
			
			$action->save();
			
			return true;
		}
		#fail
		catch (Exception $e) 
		{
			return false;
		}
		
	}
	
	/**
	* Get total seconds by project id 
	* 
	* @pram projectID
	# @pram string Format
	*
	* @response string 
	*/
	public function fetch($projectID, $format = NULL)
	{
		
		$timer = new Timer();
		
		$timer = Timer::Find($projectID);
		
		# time magic 
		$time_seconds = $timer->time_elapsed_total;
		$dtF = new DateTime("@0");
		$dtT = new DateTime("@$time_seconds");
		
		# pick format
		switch($format)
		{
			case NULL:
			case 'time':
				//3603
				# time < 1 hour
				if( (int) $time_seconds < 60)
				{
					return $dtF->diff($dtT)->format('%s seconds'); 
				}
				else if( (int) $time_seconds < 3600)
				{
					return $dtF->diff($dtT)->format('%i minutes and %s seconds'); 
				}
				else if( (int) $time_seconds < 86400)
				{
					return $dtF->diff($dtT)->format('%h hours, %i minutes and %s seconds'); 
				}
				else if( (int) $time_seconds >= 86400)
				{
					return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
				}
				
			break;
			
			case 'hours':
				
				$dtF = new DateTime("@0");
				
				$dtT = new DateTime("@$time_seconds");
				
				return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
				
			break;
			
	
		}
		
	}
	
	/**
	* Get status of a timer by project id 
	* 
	* @pram projectID
	*
	* @response string 
	*/
	public function status($projectID)
	{
		
		$timer = new Timer();
		
		$timer = Timer::Find($projectID);
		
		$time_status= $timer->track;
	
		switch($time_status)
		{
			case 0:
				
				return 'stopped';
				
			break;
			
			case 1:
				
				return 'started';
				
			break;
		}
	
	}	

}
