@extends('_master')

@section('body')

	{{-- Page Description. ------------------------}}
	
	<div class="chalk-lines-100">
	
		<h1><a href="/projects">Projects</a> / {{ $query['name'] }}</h1>
	
		
		{{-- Description. ------------------------}}
		
		<div class="description">
	
		{{ $query['description'] }} <span class="edit"> <a href="/projects/{{ $query['id'] }}/edit">Edit</a></div>
		
		</div>		
	
	<div class="chalk-lines-50">
	
		
		{{-- Pick Proper Timer Form. ------------------------}}
		
		<?php
			
			$timer_status = StopwatchFacade::status($query['id']);
			
			switch($timer_status )
			{
				case 'started': #tracking
					
					?>
					
					{{-- Create Time Form. ------------------------}}
						
						{{ Form::open(array('url' => '/timer/'.$query['id'], 'method' => 'put') ) }}
							
							{{-- Project ID ------------------------}}
							
							{{ Form::hidden('id', $query['id'] )  }}
							
							{{-- Submit Button. ------------------------}}
							
							<div class="formElement submit">
							
							{{ Form::label('Time:') }}
									
							{{ Form::submit('Stop Timer', ['class' => 'danger']) }}
							
							<h4>extras - notes and whatever. So ya.</h4>
							
							</div>
					
						{{ Form::close() }}
	
					<?php
					
				break;
				default:
				?>
			
				{{-- Create Time Form. ------------------------}}
				
				{{ Form::open(array('url' => '/timer')) }}
					
					{{-- Project ID ------------------------}}
					
					{{ Form::hidden('id', $query['id'] )  }}
					
					{{-- Submit Button. ------------------------}}
					
					<div class="formElement submit">
							
						{{ Form::submit('+ Start Timer', ['class' => 'action']) }}
					
					</div>
					
					<h4>extras - notes and whatever. So ya.</h4>
			
				{{ Form::close() }}
					
				
				<?php
				
				break;
			}
		?>
	
	</div>
	
	<div class="chalk-lines-50">
	
		<h1> Project Feed </h1>
		
		<div class="workingHours">
		
			<h2>Project Time: {{ StopwatchFacade::fetch($query['id']); }}</h2>
		
		</div>
		
		<ul>
			
			<li>Something</li>
			
			<li>Else about</li>
			
			<li>some sort of</li>
			
			<li>action(s) the user has</li>
			
			<li> taken on any number of</li>
			
			<li> the projects they own</li>
			
		</ul>	
	
	</div>

	
@stop 


	