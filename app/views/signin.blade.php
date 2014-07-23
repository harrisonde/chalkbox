@extends('_master')

@section('body')

	<h1>Chalkbox</h1>

	<h2>Sign in</h2>

	<a href="/">Back</a>
	
	{{-- Validation. ------------------------}}
	
	<ul class="errors">
		@if(isset($errors_custom ))

		    @foreach($errors_custom as $message)
	
	        <li>{{ $message }}</li>
	
			@endforeach
		
		@endif
    
    </ul>
			
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
	
@stop 