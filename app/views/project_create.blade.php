@extends('_master')

@section('body')

	<h1>Create</h1>

	{{-- Validation. ------------------------}}
		
		@if(isset($flash_message_error))
			
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
			
	{{-- Create Project Form. ------------------------}}
	
	{{ Form::open(array('url' => '/projects')) }}
		
		{{-- Name field. ------------------------}}
		
		<div class="formElement name">
		
		{{ Form::label('Project Name:') }}
		
		{{ Form::text('name', Input::Old('name')) }}	
		
		</div>
		
		{{-- Description field. ------------------------}}
		
	    <div class="formElement description">

		{{ Form::label('Description: (Optional)') }}
		
		{{ Form::text('description', Input::Old('description')) }}
		
	    </div>
	    
	     {{-- Status field. ------------------------}}
		
	    <div class="formElement status">

		{{ Form::label('Status: ') }}
		
		{{ Form::select('status', array(
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

		{{ Form::label('Start Date: (Optional)') }}
		
		{{ Form::text('date_start', Input::Old('date_start')) }}
		
	    </div>
	    
	     {{-- Date (End) field. ------------------------}}
		
	    <div class="formElement date_end">

		{{ Form::label('End Date: (Optional)') }}
		
		{{ Form::text('date_end', Input::Old('date_end')) }}
		
	    </div>
	    
		
		{{-- Submit Button. ------------------------}}
		
		<div class="formElement submit">

		{{ Form::submit('Create Project') }}
		
		</div>
	
	{{ Form::close() }}
	
@stop 