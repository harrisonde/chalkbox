@extends('_master')

@section('body')

	<h1>Your Projects.</h1>
			
	{{-- Search Form. ------------------------}}
	
	{{ Form::open( array('url' => 'search')) }}
			
			{{ Form::text('search', Input::old('search'),  array('placeholder'=>'Project Name')) }}
			
			{{ Form::submit('Search') }}
		
		{{ Form::close() }}

			
	{{-- Project  List. ------------------------}}
	
	@if (isset($query))
		
		@foreach($query as $node) 
		
			<a href="/projects/details/{{ $node['id'] }}">{{ $node['name'] }}</a>
		
		@endforeach
	
	@endif
@stop 	