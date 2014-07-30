@extends('_master')

@section('body')
	
	{{-- Page Description. ------------------------}}
	
	<div class="chalk-lines-center">
	
		<h1>Password Reset</h1>
				
	</div>

	<div class="chalk-lines-center">
		
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

	</div>
	
@stop 