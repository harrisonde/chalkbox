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

Route::get('projects/{id}/edit/settings', 'ProjectController@editSetting');

Route::post('projects/{id}/edit/name', 'ProjectController@editSettingName');

Route::resource('projects', 'ProjectController');

Route::resource('register', 'RegisterController');

Route::resource('search', 'SearchController');

Route::resource('signin', 'SignInController');

Route::resource('signout', 'SignOutController');

Route::get('system_default_styles', function()
{
	return View::make('_styles');
});

Route::resource('timer', 'TimerController');

Route::resource('note', 'NoteController');
/*
* Laravel will let use display a good old 404, let's use that little guy. 
*/

App::missing(function($exception){
     return Response::make("Something went wrong! Sad day :(    <br/> So sorry.", 404);
});		

# /app/routes.php
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

	echo 'hostname:' . gethostname() . '<br>';
    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});