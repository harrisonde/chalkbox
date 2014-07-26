@extends('_master')

@section('body')

	<h1>Sign in</h1>
	
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
	
	{{ Form::close() }}
	
	{{link_to('password', 'Forgotten password and other sign-in problems')}}
	
@stop 