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
	
	{{ Form::open(array('url' => '/projects')) }}
		
		{{-- Name field. ------------------------}}
		
		<div class="formElement name">
		
		{{ Form::label('Project Name:', Input::Old('name')) }}
		
		{{ Form::text('name') }}	
		
		</div>
		
		{{-- Description field. ------------------------}}
		
	    <div class="formElement description">

		{{ Form::label('Description: (Optional)', Input::Old('description')) }}
		
		{{ Form::text('description') }}
		
	    </div>
	    
	     {{-- Status field. ------------------------}}
		
	    <div class="formElement status">

		{{ Form::label('Status: ',  Input::Old('date_end')) }}
		
		{{ Form::select('panda_colour', array(
        	'Open'      => 'Open',
			'In Progress'     => 'In Progress',
			'Close'     => 'Close',
			'Resolved'  => 'Resolved',
			'Reopened'  => 'Reopened',
			), 'Open') 
		}}
		
	    </div>
	    
	    {{-- Date (Start) field. ------------------------}}
		
	    <div class="formElement date_start">

		{{ Form::label('Start Date: (Optional)', Input::Old('date_start')) }}
		
		{{ Form::text('date_start') }}
		
	    </div>
	    
	     {{-- Date (End) field. ------------------------}}
		
	    <div class="formElement date_end">

		{{ Form::label('End Date: (Optional)', Input::Old('date_end')) }}
		
		{{ Form::text('date_end') }}
		
	    </div>
	    
		
		{{-- Submit Button. ------------------------}}
		
		<div class="formElement submit">

		{{ Form::submit('Create Project') }}
		
		</div>
	
	{{ Form::close() }}
	
	{{link_to('password', 'Forgotten password and other sign-in problems')}}
	
@stop 