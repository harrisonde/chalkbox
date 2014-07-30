@extends('_master')

@section('body')

	<div class="chalk-lines-50">
	
		<h1>Projects</h1>		
		
		{{-- Create Project. ------------------------}}		
			
			<div class="create">
				
				<button onClick="window.location.href='/projects/create'">+ New Project </button>
				
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
	
		</div>
		
	@endif

	<div class="chalk-lines-50">
	
		<h1> Project Feed </h1>
		
		<ul>
			
			<li>Something</li>
			
			<li>Else about</li>
			
			<li>some sort of</li>
			
			<li>action(s) the user has</li>
			
			<li> taken on any number of</li>
			
			<li> the projects they own</li>
			
		</ul>	
	
	</div>
@stop 	