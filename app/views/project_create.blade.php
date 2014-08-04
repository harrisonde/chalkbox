@extends('_master')

@section('body')

	
	{{-- Page Description. ------------------------}}
	
	<div class="chalk-lines-100">
	
		<h1>+ New Project</h1>
	
	</div>
	
	<div class="chalk-lines-75">	
			
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
			
			<span class="helper">(YYYY-MM-DD)</span>
			
			{{ Form::text('date_start', Input::Old('date_start')) }}
			
		    </div>
		    
		     {{-- Date (End) field. ------------------------}}
			
		    <div class="formElement date_end">
	
			{{ Form::label('End Date: (Optional)') }}
			
			<span class="helper">(YYYY-MM-DD)</span>
			
			{{ Form::text('date_end', Input::Old('date_end')) }}
			
		    </div>
		    
			
			{{-- Submit Button. ------------------------}}
			
			<div class="formElement submit">
	
			{{ Form::submit('+ Create Project', ['class' => 'action'] ) }}
			
			<a href="/projects">Cancel</a>
			</div>
		
		{{ Form::close() }}

	</div>
	
	<div class="chalk-lines-25">
	
		<h2>Creating a project help</h2>
		<h3>Suggested Names</h3>		
		<h4>Tips</h4>
	</div>
@stop 