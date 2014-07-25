@extends('_master')

@section('body')

	<h1>Password Reset.</h1>
	
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

@stop