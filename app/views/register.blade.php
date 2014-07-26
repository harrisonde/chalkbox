@extends('_master')

@section('body')

	<h1>Really Simple. Really Fast.</h1>
	
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
	
	{{-- Registration Form. ------------------------}}
	
	{{ Form::open() }}
			
		{{-- Email field. ------------------------}}
		
		<div class="formElement email">
		
		{{ Form::label('email:') }}
		
		{{ Form::text('email', Input::Old('email') ) }}
		
		</div>
		
		
		{{-- Password field. ------------------------}}
		
		<div class="formElement password">
		
		{{ Form::label('password', 'Password:') }}
		
		{{ Form::password('password') }}
		
		</div>
		
		{{-- Submit Button. ------------------------}}
		
		<div class="formElement submit">
		
		{{ Form::submit('Register') }}
		
		</div>
	{{ Form::close() }}

@stop 