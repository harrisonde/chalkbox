@extends('_master')

@section('body')

	<h1>Your Projects.</h1>		
		
	
	{{-- Validation. ------------------------}}
	@if( isset($flash_message_error) )
		
		<ul class="errors">
	  
	        @foreach($flash_message_error as $error)
	
	        <li>{{ $error }}</li>
	
			@endforeach
	    </ul>
	
	@endif	
    
    {{-- Messages. ------------------------}}
       
    @if(isset($flash_message_success ))
		
		<ul class="success">

		    @foreach($flash_message_success as $message)
	
	        <li>{{ $message }}</li>
	
			@endforeach
		
		</ul>
	
	@endif
		
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