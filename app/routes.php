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

Route::resource('projects/details', 'ProjectDetailsController');

Route::resource('projects', 'ProjectController');

Route::resource('register', 'RegisterController');

Route::resource('search', 'SearchController');

Route::resource('signin', 'SignInController');

Route::resource('signout', 'SignOutController');

Route::get('mail', function(){

	$name = 'index'; # can be 'html.view' or 'text.view'.
	$data = array('boom' => 'city!');  #data that you want to make available to your email, same as passing data to a view.
	//$message =  # allows you to specify a couple of different things on the email such as who to send it to and the subject of the message
	
	Mail::send($name, $data, function($message) #Mail::send(array('html.view', 'text.view'), $data, $callback);
	{
    	$message->to('harrison.destefano@gmail.com', 'Harrison')
    	->subject('Welcome!');
	});
});