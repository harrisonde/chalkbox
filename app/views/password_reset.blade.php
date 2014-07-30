@extends('_master')

@section('body')

	{{-- Page Description. ------------------------}}
	
	<div class="chalk-lines-center">
	
		<h1>Password Reset.</h1>

	</div>
	
	<div class="chalk-lines-center">
		{{-- Password  Form. ------------------------}}
		
		<form>
		
		    <input type="hidden" name="token" value="<?php if(isset($token)){echo($token);} ?>">
			
			<div class="formElement email">
		    	
		    	{{ Form::label('email:') }}
		    	
		    	<input type="email" name="email">
			
			</div>
			
			<div class="formElement password">
			
				{{ Form::label('password:') }}
				
				<input type="password" name="password">
		
			</div>
			
			<div class="formElement password">		
				
				{{ Form::label('Password Confirmation:') }}
				
				<input type="password" name="password_confirmation">
			
			</div>
		
			<div class="formElement password">
			
		    	<input type="submit" value="Reset Password">
		
			</div>
		
		</form>

	</div>
	
@stop