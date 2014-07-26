@extends('_master')

@section('body')
	
	<h1><a href="/projects">Projects</a> / {{ $query['name'] }}</h1>
	
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
	
	{{-- Description. ------------------------}}
	
	<div class="description">
	
		{{ $query['description'] }} <span class="edit">{{link_to('projects/', 'Edit')}}</div>
		
	</div>	
			
	need to add timer here... 
	
	extras - notes and whatever. So ya.
	
@stop 


	