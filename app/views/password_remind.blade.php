<?php 

	if( isset($error) )
	{ 
		print_r($error);
	}
	
	if( isset($status) )
	{ 
		print_r($status);
	}
?>
@extends('_master')

@section('body')

	<h1>Chalkbox</h1>

	<h2>Password Reset</h2>

	<a href="/">Back</a>
	
	{{-- Validation. ------------------------}}
	
	
		@if( isset($errors) && sizeof($errors)  > 0)
		
		<ul class="errors">
	  
	        <li>{{ $errors }}</li>
	
	    </ul>
	
	@endif	
    
    {{-- Messages. ------------------------}}
    
    @if(isset($message_custom ))
		
		<ul class="success">

		    @foreach($message_custom as $message)
	
	        <li>{{ $message }}</li>
	
			@endforeach
		
		</ul>
	
	@endif
			
	{{-- Reminder Form. ------------------------}}
	
	{{ Form::open() }}
		
		{{-- Email field. ------------------------}}
		
		<div class="formElement email">
		
		{{ Form::label('email', 'Email: (email@somewhere.com)') }}
		
		{{ Form::text('email') }}	
		
		</div>
				
		{{-- Submit Button. ------------------------}}
		
		<div class="formElement submit">

		{{ Form::submit('Sign in') }}
		
		</div>
	
	{{ Form::close() }}
	
@stop 