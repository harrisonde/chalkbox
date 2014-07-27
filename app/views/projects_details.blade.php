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
	
	<div class="workingHours">
	
	{{ StopwatchFacade::fetch($query['id']); }}
	
	</div>
	
	{{-- Pick Proper Timer Form. ------------------------}}
	
	<?php
		
		$timer_status = StopwatchFacade::status($query['id']);
		
		switch($timer_status )
		{
			case 'started': #tracking
				
				?>
				
					<div class="timer">
		
					{{-- Create Time Form. ------------------------}}
					
					{{ Form::open(array('url' => '/timer/'.$query['id'], 'method' => 'put') ) }}
						
						{{-- Project ID ------------------------}}
						
						{{ Form::hidden('id', $query['id'] )  }}
						
						{{-- Submit Button. ------------------------}}
						
						<div class="formElement submit">
						
						{{ Form::label('Time:') }}
								
						{{ Form::submit('Stop Timer') }}
						
						</div>
				
					{{ Form::close() }}
					
				</div>		
				
				<?php
				
			break;
			default:
			?>
				
				<div class="timer">
		
				{{-- Create Time Form. ------------------------}}
				
				{{ Form::open(array('url' => '/timer')) }}
					
					{{-- Project ID ------------------------}}
					
					{{ Form::hidden('id', $query['id'] )  }}
					
					{{-- Submit Button. ------------------------}}
					
					<div class="formElement submit">
					
					{{ Form::label('Time:') }}
							
					{{ Form::submit('Start Timer') }}
					
					</div>
			
				{{ Form::close() }}
				
			</div>		
			
			<?php
			
			break;
		}
	?>
	
	
	
	
	<h4>extras - notes and whatever. So ya.</h4>
	
@stop 


	