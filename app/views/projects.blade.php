@extends('_master')

@section('body')

	<div class="chalk-lines-50">
	
		{{-- Create Project. ------------------------}}		
		
		<div class="epic">
				
				<div class="tab">
				
					<span class="project-count">
						@if (isset($query))
							
							{{ sizeof($query) }} project(s)
							
						@endif
					</span>
					
					<div class="create">
						
						<button onClick="window.location.href='/projects/create'">+ New Project </button>
						
					</div>
		
				</div>
			
			{{-- Project  List. ------------------------}}
		
			@if (isset($query))
				<div class="user-project-list">
				
					<ul>
					@foreach($query as $node) 
					
					<li><span class="icon-notebook"></span><a href="/projects/{{ $node['id'] }}">{{ $node['name'] }}</a></li>
					
					@endforeach
					</ul>
				
				</div>
		
			</div>
			
	</div>
		
	@endif

	<div class="chalk-lines-50">
	
		<h1> News Feed </h1>

		<ul class="news-feed">
			
			@foreach($actions as $action)
	
			<li><span class="icon-{{ $action['type'] }}"></span>{{ $action['detail'] }}</li>
			
			@endforeach	
	
		</ul>
		
	</div>
@stop 	