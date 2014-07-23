@extends('_master')

@section('body')
	
	<h1>Chalkbox</h1>
	
	<h2>Search Results.</h2>
	
	<a href="/projects">Back</a>
	
	{{-- Search Form. ------------------------}}
	
	{{ Form::open( array('url' => 'search')) }}
	
			{{ Form::text('search', Input::old('search'),  array('placeholder'=>'Project Name')) }}
	
			{{ Form::submit('Search') }}
	
		{{ Form::close() }}

		
	{{-- Search Results. ------------------------}}
	
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