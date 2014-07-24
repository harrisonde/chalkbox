@extends('_master')

@section('body')

	<h1>Chalkbox</h1>

	<h2>Sign in</h2>

	<a href="/">Back</a>
	
	{{-- Validation. ------------------------}}
	
	
		@if(isset($errors_custom ))
		
			<ul class="errors">
	
			    @foreach($errors_custom as $message)
		
		        <li>{{ $message }}</li>
		
				@endforeach
			
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
			
	{{-- Sign In Form. ------------------------}}
	
	{{ Form::open() }}
		
		{{-- Email field. ------------------------}}
		
		<div class="formElement email">
		
		{{ Form::label('email', 'Email: (email@somewhere.com)') }}
		
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