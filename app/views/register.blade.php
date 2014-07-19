@extends('_master')
@section('body')
	<h1>Chalkbox</h1>
	<h2>Really Simple. Really Fast.</h2>
	<a href="/">Back</a>
	{{ Form::open() }}
		{{ Form::label('emailAddress', 'Email: (email@somewhere.com)') }}
		{{ Form::text('emailAddress') }}
		{{ Form::label('password', 'Password:') }}
		{{ Form::text('password') }}
		{{ Form::submit('Register') }}
	{{ Form::close() }}
@stop 