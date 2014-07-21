@extends('_master')
@section('body')
	<h1>Chalkbox</h1>
	<h2>Sign in</h2>
	<a href="/">Back</a>
	
	@if (isset($error))
		
		
		{{ $error }}
	
	@endif
	
	{{ Form::open() }}
		
		{{ Form::label('email', 'Email: (email@somewhere.com)') }}
		
		{{ Form::text('email') }}
		
		{{ Form::label('password', 'Password:') }}
		
		{{ Form::text('password') }}
		
		{{ Form::submit('Sign in') }}
	
	{{ Form::close() }}
@stop 