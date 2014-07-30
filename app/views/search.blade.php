@extends('_master')

@section('body')
	
	<h2>Search Results.</h2>
		
	{{-- Search Form. ------------------------}}
	
	{{ Form::open( array('url' => 'search')) }}
	
			{{ Form::text('search', Input::old('search'),  array('placeholder'=>'Project Name')) }}
	
			{{ Form::submit('Search') }}
	
		{{ Form::close() }}

		
	{{-- Search Results. ------------------------}}
	
	@if (isset($query_results))
	
		@foreach($query_results as $node) 
			
			@if (isset($node['name']))
				
				<a href="/projects/{{ $node['id'] }}">{{ $node['name'] }}</a>
			
			@else
			
				<p>{{ $node }}</p>	
			
			@endif
	
		@endforeach
	
	@endif

@stop 	