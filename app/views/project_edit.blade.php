@extends('_master')

@section('body')
	
	{{-- Page Description. ------------------------}}
	
	<div class="chalk-lines-100">

		<h1><a href="/projects">Projects</a> / <a href="/projects/{{$query['id']}}">{{ $query['name'] }}</a> / Edit</h1>

	</div>
	
	<div class="chalk-lines-75">	
							
		{{-- Create Project Form. ------------------------}}
		
		{{ Form::open(array('url' => '/projects/'.$query['id'], 'method' => 'put') ) }}
					
			{{-- Description field. ------------------------}}
			
		    <div class="formElement description">
	
			{{ Form::label('Description: (Optional)') }}
			
			<input type="text" name="description" value="<?php echo($query['description']) ?>" />		
			
		    </div>
		    
		     {{-- Status field. ------------------------}}
			
		    <div class="formElement status">
	
			{{ Form::label('Status: ') }}
			
			{{ Form::select('status', array(
	        	'Open'         => 'Open',
				'In Progress'  => 'In Progress',
				'Close'        => 'Close',
				'Resolved'     => 'Resolved',
				'Reopened'     => 'Reopened',
				), $query['status']) 
			}}
			
		    </div>
		    
		    {{-- Date (Start) field. ------------------------}}
			
		    <div class="formElement date_start">
	
			{{ Form::label('Start Date: (Optional)') }}
			
			<span class="helper">(YYYY-MM-DD)</span>
			
			<input type="text" name="date_start" value="<?php echo($query['date_start']) ?>" />
			
		    </div>
		    
		     {{-- Date (End) field. ------------------------}}
			
		    <div class="formElement date_end">
	
			{{ Form::label('End Date: (Optional)') }}
			
			<span class="helper">(YYYY-MM-DD)</span>
			
			<input type="text" name="date_end" value="<?php echo($query['date_end']) ?>" />
			
		    </div>
		    
			
			{{-- Submit Button. ------------------------}}
			
			<div class="formElement submit">
	
			{{ Form::submit('Update Project') }}
			
			</div>
		
		{{ Form::close() }}
	
	</div>	
	
	<div class="chalk-lines-25">
	
		<div class="pannel">
		
			<ul>
			
				<li><a href="/projects/{{ $query['id'] }}">Project</a></li>
				
				<li class="active"><a href="/projects/{{ $query['id'] }}/edit">Edit</a></li>
				
				<li><a class="" href="/projects/{{$query['id']}}/edit/settings">Settings</a></li>
				
			</ul>	
		
		</div>
		
	</div>
	
@stop 