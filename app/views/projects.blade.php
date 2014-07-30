@extends('_master')

@section('body')

	<h1>Projects.</h1>		
	
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