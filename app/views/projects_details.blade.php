@extends('_master')

@section('body')

	<h1>Chalkbox</h1>

	<h2>Project Details.</h2>

	<a href="/projects">Back</a>

		
	{{-- Search Form. ------------------------}}
		
	{{ Form::open( array('url' => 'search')) }}
	
		{{ Form::text('search', Input::old('search'),  array('placeholder'=>'Project Name')) }}
	
		{{ Form::submit('Search') }}
	
	{{ Form::close() }}
	
	<?php 
		# uncomment to display query
		//print_r($query) 
	?>
	
			
	{{-- Search Results. ------------------------}}
	
	<h3>Project Name: {{ $query['name'] }}</h3>
	
	<h3>Last Update: {{ $query['updated_at'] }}</h3>
	
	<h3>Project Time: {{ $query['time_elapsed_total'] }}</h3>
	
	<h3>Project Created: {{ $query['created_at'] }}</h3>

@stop 


	