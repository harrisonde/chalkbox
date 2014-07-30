@extends('_master')

@section('body')
	
	
	{{-- Page Description. ------------------------}}
	
	<div class="chalk-lines-100">
	
		<h1>Search</h1>
	
	</div>
	
	<div class="chalk-lines-75">			
		
		{{-- Section title. ------------------------}}
		
		@if (isset($query_results))
			
			{{-- Search results. ------------------------}}
				
			<h2>{{ sizeof($query_results) }} Result(s)</h2>	
				
			<ul class="result">
			
			@foreach($query_results as $node) 
				
				@if (isset($node['name']))
					
					<li><a href="/projects/{{ $node['id'] }}">{{ $node['name'] }}</a></li>
				
				@else
				
					<p>{{ $node }}</p>	
				
				@endif
		
			@endforeach
			
			</ul>
			
		@endif
	
	</div>
	
	<div class="chalk-lines-25">
			
		{{-- Search Form. ------------------------}}
		
		{{ Form::open( array('url' => 'search')) }}
		
				{{ Form::text('search', Input::old('search'),  array('placeholder'=>'Project Name')) }}
		
				{{ Form::submit('Search') }}
		
			{{ Form::close() }}
	
	</div>

@stop 	