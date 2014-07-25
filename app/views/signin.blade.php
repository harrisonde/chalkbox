@extends('_master')

@section('body')

	<h1>Sign in</h1>
	
	{{-- Validation. ------------------------}}
	
		@if(isset($flash_message_error ))
		
			<ul class="errors">
	
			    @foreach($flash_message_error as $message)
		
		        <li>{{ $message }}</li>
		
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
			
	{{-- Sign In Form. ------------------------}}
	
	{{ Form::open() }}
		
		{{-- Email field. ------------------------}}
		
		<div class="formElement email">
		
		{{ Form::label('email', 'Email: (email@somewhere.com)', Input::Old('email')) }}
		
		{{ Form::text('email') }}	
		
		</div>
		
		{{-- Password field. ------------------------}}
		
	    <div class="formElement password">

		{{ Form::label('password', 'Password:') }}
		
		{{ Form::text('password') }}
		
	    </div>
		
		{{-- Submit Button. ------------------------}}
		
		<div class="formElement submit">

		{{ Form::submit('Sign in') }}
		
		</div>
	
	{{ Form::close() }}
	
	{{link_to('password', 'Forgotten password and other sign-in problems')}}
	
@stop 