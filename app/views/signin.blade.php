@extends('_master')

@section('body')
	
	{{-- Page Description. ------------------------}}
	
	<div class="chalk-lines-center">
	
		<h1>Sign in</h1>
	
	</div>
	
	<div class="chalk-lines-center">
	
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
		
		{{ Form::password('password') }}
		
	    </div>
		
		{{-- Submit Button. ------------------------}}
		
		<div class="formElement submit">

		{{ Form::submit('Sign in') }}
		
		</div>
		
		{{-- Reset Password Link. ------------------------}}
		
		{{link_to('password', 'Forgot password')}}
		
	
	{{ Form::close() }}
	
	
	</div>
	
@stop 