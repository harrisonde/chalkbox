<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::resource('password', 'RemindersController');

Route::resource('password/reset', 'RemindersController');

Route::resource('projects', 'ProjectController');

Route::resource('register', 'RegisterController');

Route::resource('search', 'SearchController');

Route::resource('signin', 'SignInController');

Route::resource('signout', 'SignOutController');

Route::resource('timer', 'TimerController');

/*
* Laravel will let use display a good old 404, let's use that little guy. 
*/
/*
App::missing(function($exception){
     return Response::make("Something went wrong! Said day. So sorry.", 404);
}); */

Route::get('/stopwatcha', function()
{
	StopwatchFacade::what();
	
	$date = date('Y-m-d H:i:s');
	
	$timeFirst  = strtotime('2011-05-12 18:20:20');
	$timeSecond = strtotime('2011-05-13 18:20:20');
	$differenceInSeconds = $timeSecond - $timeFirst;
	
	echo $differenceInSeconds;
});

