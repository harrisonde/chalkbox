@extends('_master')

@section('body')
	
	<h1><a href="/projects">Projects</a> / {{ $query['name'] }}</h1>
	
	{{-- Validation. ------------------------}}
	@if( isset($flash_message_error) )
		
		<ul class="errors">
	  
	        @foreach($flash_message_error as $error)
	
	        <li>{{ $error }}</li>
	
			@endforeach
	    </ul>
	
	@endif	
    
    {{-- Messages. ------------------------}}
       
    @if(isset($flash_message_success ))
		
		<ul class="success">

		    @foreach($flash_message_success as $message)
	
	        <li>{{ $message }}</li>
	
			@endforeach
		
		</ul>
	
	@endif

	
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


	