@extends('_master')

@section('body')

	<h1>Password Reset.</h1>

	{{-- Validation. ------------------------}}
		
	@if(sizeof($errors) > 0)
		
			<ul class="errors">
			
			@foreach ($errors->all('<li>:message</li>') as $message)
			
				{{ $message }}
			
			@endforeach
			
			</ul>
		
	@endif
	    
    {{-- Flash Messages. ------------------------}}
    
    <?php $value = Session::get('flash_message_success'); ?>
		
	<?php if(sizeof($value) > 0){ ?>
		
		<ul class="success">
		
			<?php { echo($value); } ?>
		
		</ul>	
	
	<?php }  ?>


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