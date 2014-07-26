@extends('_master')

@section('body')
	
	<h1><a href="/projects">Projects</a> / <a href="/projects/{{$query['id']}}">{{ $query['name'] }}</a> / Edit</h1>

	
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
		
			<?php { echo('$value'); } ?>
		
		</ul>	
	
	<?php }  ?>
						
	{{-- Create Project Form. ------------------------}}
	
	{{ Form::open(array('url' => '/projects/'.$query['id'], 'method' => 'put') ) }}
		
		{{-- Name field. ------------------------}}
		
		<div class="formElement name">
		
		{{ Form::label('Project Name:') }}
		
		<input type="text" name="name" value="<?php echo($query['name']) ?>" />	
		
		</div>
		
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
		
		<input type="text" name="date_start" value="<?php echo($query['date_start']) ?>" />
		
	    </div>
	    
	     {{-- Date (End) field. ------------------------}}
		
	    <div class="formElement date_end">

		{{ Form::label('End Date: (Optional)') }}
		
		<input type="text" name="date_end" value="<?php echo($query['date_end']) ?>" />
		
	    </div>
	    
		
		{{-- Submit Button. ------------------------}}
		
		<div class="formElement submit">

		{{ Form::submit('Create Project') }}
		
		</div>
	
	{{ Form::close() }}
	
@stop 