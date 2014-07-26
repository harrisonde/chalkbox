@extends('_master')

@section('body')
	
	<h2>Search Results.</h2>
	
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

	
	{{-- Search Form. ------------------------}}
	
	{{ Form::open( array('url' => 'search')) }}
	
			{{ Form::text('search', Input::old('search'),  array('placeholder'=>'Project Name')) }}
	
			{{ Form::submit('Search') }}
	
		{{ Form::close() }}

		
	{{-- Search Results. ------------------------}}
	
	@if (isset($query_results))
	
		@foreach($query_results as $node) 
			
			@if (isset($node['name']))
				
				<a href="/projects/{{ $node['id'] }}">{{ $node['name'] }}</a>
			
			@else
			
				<p>{{ $node }}</p>	
			
			@endif
	
		@endforeach
	
	@endif

@stop 	