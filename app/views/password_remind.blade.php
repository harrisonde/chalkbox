@extends('_master')

@section('body')

	<h1>Password Reset</h1>

	<a href="/">Back</a>
	
	{{-- Validation. ------------------------}}
	
	
		@if( isset($error) )
		
		<ul class="errors">
	  
	        <li>{{ $error }}</li>
	
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