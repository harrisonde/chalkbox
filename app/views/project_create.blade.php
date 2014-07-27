@extends('_master')

@section('body')

	<h1>Create</h1>

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