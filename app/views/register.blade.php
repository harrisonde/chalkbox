@extends('_master')

@section('body')

	<h1>Chalkbox</h1>

	<h2>Really Simple. Really Fast.</h2>

	<a href="/">Back</a>
	
	@if (isset( $query['response'][0][200]) )
	
		{{ $query['response'][0][200] }}			

	@endif
	
	@if (isset( $query['response'][0][409]) )
	
		{{ $query['response'][0][409] }}			

	@endif
	
	{{ Form::open() }}
		
		{{ Form::label('email', 'Email: (email@somewhere.com)') }}
		
		{{ Form::text('email') }}
		
		{{ Form::label('username', 'Username:') }}
		
		{{ Form::text('username') }}
		
		{{ Form::label('password', 'Password:') }}
		
		{{ Form::text('password') }}
		
		{{ Form::submit('Register') }}
	
	{{ Form::close() }}

@stop 