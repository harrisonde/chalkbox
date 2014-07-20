@extends('_master')
@section('body')
	<h1>Chalkbox</h1>
	<h2>Search Results.</h2>
	<a href="/projects">Back</a>
	{{ Form::open( array('url' => 'search')) }}
			{{ Form::text('search', Input::old('search'),  array('placeholder'=>'Project Name')) }}
			{{ Form::submit('Search') }}
		{{ Form::close() }}

	@if (isset($query))
		@foreach($query as $node) 
			<p>{{ $node }}</p>
		@endforeach
	@endif
@stop 	