<?php
	use Illuminate\Support\Facades\Facade;
	
	class StopwatchFacade extends Facade
	{
		protected static function getFacadeAccessor() { 
            return 'MyAlias'; 
        }
    }