@extends('_master')

@section('body')

	<h1>Password Reset</h1>

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
			
	{{-- Reminder Form. ------------------------}}
	
	{{ Form::open() }}
		
		{{-- Email field. ------------------------}}
		
		<div class="formElement email">
		
		{{ Form::label('email', 'Email: (email@somewhere.com)') }}
		
		{{ Form::text('email') }}	
		
		</div>
				
		{{-- Submit Button. ------------------------}}
		
		<div class="formElement submit">

		{{ Form::submit('Reset Password') }}
		
		</div>
	
	{{ Form::close() }}
	
@stop 