@extends('_master')

@section('body')

	<h1>Projects.</h1>		
	
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
	
	{{-- Create Project. ------------------------}}		
		
		<div class="create">
		
			{{link_to('projects/create', '+ New Project')}}	
	
		</div>
	
	{{-- Project  List. ------------------------}}
	
	@if (isset($query))
		<div class="projectList">
		
			<ul>
			@foreach($query as $node) 
			
			<li><a href="/projects/{{ $node['id'] }}">{{ $node['name'] }}</a></li>
			
			@endforeach
			</ul>
		</div>
		
	@endif
@stop 	