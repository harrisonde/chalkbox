@extends('_master')

@section('body')

	<h1>Really Simple. Really Fast.</h1>
	
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