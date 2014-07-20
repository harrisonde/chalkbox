@extends('_master')
@section('body')
	<h1>Chalkbox</h1>
	<h2>Your Projects.</h2>
	<a href="/">Back</a>
	@if (isset($query))
		@foreach($query as $node) 
			<p>{{ $node }}</p>
		@endforeach
	@endif
@stop 	