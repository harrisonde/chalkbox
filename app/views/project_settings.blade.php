@extends('_master')

@section('body')
	
	<h1><a href="/projects">Projects</a> / <a href="/projects/{{$query['id']}}">{{ $query['name'] }}</a> / Edit / Settings</h1>

	
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
						
	{{-- Create Settings Form. ------------------------}}

	
	{{ Form::open(array('action' => 'ProjectController@editSettingName')) }}	
	
		{{-- Name field. ------------------------}}
		
		<div class="formElement name">
		
		{{ Form::label('Project Name:') }}
		
		<input type="hidden" name="id" value="<?php echo($query['id']) ?>" />	
		
		<input type="text" name="name" value="<?php echo($query['name']) ?>" />	
		
		</div>
			    
		
		{{-- Submit Button. ------------------------}}
		
		<div class="formElement submit">

		{{ Form::submit('Rename this project') }}
		
		</div>
	
	{{ Form::close() }}
	
	{{-- Create Delete Form. ------------------------}}
	
	<h4> Danger Zone </h4>
	
	{{ Form::open(array('url' => '/projects/'.$query['id'], 'method' => 'delete') ) }}
		
		{{-- Name field. ------------------------}}
		
		<div class="formElement name">
		
		{{ Form::label('Delete this project') }}
		
		<span class="helper">(Once you delete, there is no going back!)</span>
		
		<input type="hidden" name="name" value="<?php echo($query['name']) ?>" />	
		
		</div>
			    
		
		{{-- Submit Button. ------------------------}}
		
		<div class="formElement submit">

		{{ Form::submit('Delete this project') }}
		
		</div>
	
	{{ Form::close() }}
	
	
@stop 