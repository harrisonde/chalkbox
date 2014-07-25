@extends('_master')

@section('body')
	
	<h1>Chalkbox</h1>
	
	<h2>Search Results.</h2>
	
	{{-- Validation. ------------------------}}
	
	@if( isset($error) )
		
		<ul class="errors">
	  
	        @foreach($error as $error)
	
	        <li>{{ $error }}</li>
	
			@endforeach
	    </ul>
	
	@endif	
    
    {{-- Messages. ------------------------}}
    
    @if(isset($message_custom ))
		
		<ul class="success">

		    @foreach($message_custom as $message)
	
	        <li>{{ $message }}</li>
	
			@endforeach
		
		</ul>
	
	@endif

	
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