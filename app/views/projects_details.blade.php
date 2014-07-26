@extends('_master')

@section('body')

	
	<h1><a href="/projects">Projects</a> / {{ $query['name'] }}</h1>
	
	{{-- Validation. ------------------------}}
		
	@if(sizeof($errors) > 0)
		
			<ul class="errors">
			
			@foreach ($errors->all('<li>:message</li>') as $message)
			
				{{ $message }}
			
			@endforeach
			
			</ul>
		
	@endif
	    
    {{-- Flash Messages. ------------------------}}
    
    <?php $value = Session::get('flash_message_success'); ?>
		
	<?php if(sizeof($value) > 0){ ?>
		
		<ul class="success">
		
			<?php { echo($value); } ?>
		
		</ul>	
	
	<?php }  ?>

	
	{{-- Description. ------------------------}}
	<div class="description">
	
		{{ $query['description'] }} <span class="edit"> <a href="/projects/{{ $query['id'] }}/edit">Edit</a></div>
		
	</div>	
			
	need to add timer here... 
	
	extras - notes and whatever. So ya.
	
@stop 


	