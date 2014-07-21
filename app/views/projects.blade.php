@extends('_master')
@section('body')
	<h1>Chalkbox</h1>
	<h2>Your Projects.</h2>
	<a href="/">Back</a>
	
	{{ Form::open( array('url' => 'search')) }}
			
			{{ Form::text('search', Input::old('search'),  array('placeholder'=>'Project Name')) }}
			
			{{ Form::submit('Search') }}
		
		{{ Form::close() }}

	@if (isset($query))
		
		@foreach($query as $node) 
		
			<a href="/projects/details/{{ $node['id'] }}">{{ $node['name'] }}</a>
		
		@endforeach
	
	@endif
@stop 	