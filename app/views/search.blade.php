@extends('_master')

@section('body')
	
	<h1>Chalkbox</h1>
	
	<h2>Search Results.</h2>
	
	<a href="/projects">Back</a>
	
	{{-- Search form to allow Chalkbox users to search all projects --}}
	
	{{ Form::open( array('url' => 'search')) }}
	
			{{ Form::text('search', Input::old('search'),  array('placeholder'=>'Project Name')) }}
	
			{{ Form::submit('Search') }}
	
		{{ Form::close() }}

	{{-- Loop the query object and display the items. If nothing found, display no results. --}}
	
	@if (isset($query))
	
		@foreach($query as $node) 
			
			@if (isset($node['name']))
				
				<a href="/projects/details/{{ $node['id'] }}">{{ $node['name'] }}</a>
			
			@else
			
				<p>{{ $node }}</p>	
			
			@endif
	
		@endforeach
	
	@endif

@stop 	