@extends('_master')

@section('body')

	{{-- Page Description. ------------------------}}
	
	<div class="chalk-lines-center">
	
		<h1>Really Simple Time Tracking</h1>
	
	</div>
	
	<div class="chalk-lines-center">
		
		{{-- Registration Form. ------------------------}}
		
		{{ Form::open() }}
			
			{{-- Action Description. ------------------------}}
			
			<h2>Register</h2>
				
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

	</div>
	
	
	
@stop 