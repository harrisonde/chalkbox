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
	
	# Test method to make sure facade is working 
	public function what(){
	
		echo 'a waste of 2 hours';
	}


}
