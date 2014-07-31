@extends('_master')

@section('body')

	{{-- Page Description. ------------------------}}
	
	<div class="chalk-lines-100">
	
		<h1><a href="/projects">Projects</a> / <a href="/projects/{{$query['id']}}">{{ $query['name'] }}</a> / Edit / Settings</h1>

	</div>
	
	<div class="chalk-lines-75">						
		
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
		
		<div class="clearfix">&nbsp;</div>
		
		{{-- Create Delete Form. ------------------------}}
		
		{{ Form::open(array('url' => '/projects/'.$query['id'], 'method' => 'delete') ) }}
			
			{{-- Form title. ------------------------}}
			
			<h4> Danger Zone </h4>
			
			{{-- Name field. ------------------------}}
			
			<div class="formElement name">
			
			{{ Form::label('Delete this project') }}
			
			<input type="hidden" name="name" value="<?php echo($query['name']) ?>" />	
			
			</div>
				    
			
			{{-- Submit Button. ------------------------}}
			
			<div class="formElement submit">
	
			{{ Form::submit('Delete this project', ['class' => 'danger']) }}
			
			<span class="helper"><strong>( Once you delete, there is no going back! )</strong></span>
			
			</div>
		
		{{ Form::close() }}

	</div>
	
	<div class="chalk-lines-25">
		
		<div class="panel">
		
			<ul>
			
				<li><a href="/projects/{{ $query['id'] }}">Project</a></li>
				
				<li><a href="/projects/{{ $query['id'] }}/edit">Edit</a></li>
				
				<li class="active"><a class="" href="/projects/{{$query['id']}}/edit/settings">Settings</a></li>
				
			</ul>	
		
		</div>
	
	</div>
	
@stop 