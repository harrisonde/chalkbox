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
		
		{{ Form::label('email', 'Email:', Input::Old('email')) }}
		
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
		
		{{-- Reset Password Link. ------------------------}}
		
		{{link_to('password', 'Forgot password')}}
		
		
		</div>
	
	{{ Form::close() }}
	
	
	</div>
	
@stop 