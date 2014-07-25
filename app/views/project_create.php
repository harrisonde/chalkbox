@extends('_master')

@section('body')

	<h1>Create</h1>
	
	{{-- Validation. ------------------------}}
	
		@if(isset($flash_message_error ))
		
			<ul class="errors">
	
			    @foreach($flash_message_error as $message)
		
		        <li>{{ $message }}</li>
		
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
			
	{{-- Sign In Form. ------------------------}}
	
	{{ Form::open() }}
		
		{{-- Name field. ------------------------}}
		
		<div class="formElement name">
		
		{{ Form::label('Project Name:', Input::Old('name')) }}
		
		{{ Form::text('name') }}	
		
		</div>
		
		{{-- Description field. ------------------------}}
		
	    <div class="formElement description">

		{{ Form::label('Description:', '(Optional)', Input::Old('description')) }}
		
		{{ Form::text('description') }}
		
	    </div>
	    
	    {{-- Date (Start) field. ------------------------}}
		
	    <div class="formElement date_start">

		{{ Form::label('Start Date:', '(Optional)', Input::Old('date_start')) }}
		
		{{ Form::text('date_start') }}
		
	    </div>
	    
	     {{-- Date (End) field. ------------------------}}
		
	    <div class="formElement date_end">

		{{ Form::label('End Date:', '(Optional)', Input::Old('date_end')) }}
		
		{{ Form::text('date_end') }}
		
	    </div>
	    
	    {{-- Status (Start) field. ------------------------}}
		
	    <div class="formElement date_start">

		{{ Form::label('Status:', '(Optional)', Input::Old('status')) }}
		
		{{ Form::text('status') }}
		
	    </div>
		
		{{-- Submit Button. ------------------------}}
		
		<div class="formElement submit">

		{{ Form::submit('Create Project') }}
		
		</div>
	
	{{ Form::close() }}
	
	{{link_to('password', 'Forgotten password and other sign-in problems')}}
	
@stop 