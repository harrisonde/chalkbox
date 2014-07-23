@extends('_master')

@section('body')

	<h1>Chalkbox</h1>

	<h2>Really Simple. Really Fast.</h2>
	
	{{-- Validation. ------------------------}}
	
	@if( sizeof($errors) > 0 )

		<ul class="errors">
	    
	    @foreach($errors->all() as $message)
	
	        <li>{{ $message }}</li>
	
	    @endforeach
	
	    </ul>
	
	@endif	
	
	{{-- Registration Form. ------------------------}}
	
	{{ Form::open() }}
			
		{{-- Email field. ------------------------}}
		
		<div class="formElement email">
		
		{{ Form::label('email:') }}
		
		{{ Form::text('email') }}
		
		</div>
		
		
		{{-- Password field. ------------------------}}
		
		<div class="formElement password">
		
		{{ Form::label('password', 'Password:') }}
		
		{{ Form::text('password') }}
		
		</div>
		
		{{-- Submit Button. ------------------------}}
		
		<div class="formElement submit">
		
		{{ Form::submit('Register') }}
		
		</div>
	{{ Form::close() }}

@stop 