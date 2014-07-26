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
	
	{{-- Create Project. ------------------------}}		
	
	{{link_to('projects/create', '+ New Project')}}	
	
	{{-- Project  List. ------------------------}}
	
	@if (isset($query))
		
		@foreach($query as $node) 
		
			<a href="/projects/{{ $node['id'] }}">{{ $node['name'] }}</a>
		
		@endforeach
	
	@endif
@stop 	