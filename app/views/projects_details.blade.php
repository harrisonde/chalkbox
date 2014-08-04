@extends('_master')

@section('body')

	{{-- Page Description. ------------------------}}
	
	<div class="chalk-lines-100">
	
		<h1><a href="/projects">Projects</a> / {{ $query['name'] }}</h1>
	
		{{-- Description. ------------------------}}
		
		<div class="description">
			
				@if(strlen($query['description']) == 0)
				
					<span class="edit"> <a href="/projects/{{ $query['id'] }}/edit">Add a project description</a></span>
					
				@else
					
					<h4>{{ $query['description'] }} </h4><span class="edit"> <a href="/projects/{{ $query['id'] }}/edit">Edit</a></span>
					
				@endif
				
		
		</div>	
		
		{{-- Project epic. ------------------------}}
		
		<div class="epic">
			
			<ul>
			
				<?php $timer_status = StopwatchFacade::status($query['id']); ?> 
				
				<?php	switch($timer_status) {
					
						case 'started': ?>
			
				<li><span class="icon-time"></span>Timing</li>
					
				<?php	break;
						
						default: ?>
					
				<li><span class="icon-time-stop"></span>Timer Stopped</li>
					
				<?php	break;
				
					} ?>				
				
				<li class="actions"> 
				
					<span class="icon-update"></span>
					
					@if( sizeof( $actions ) > 1 )
					
						{{ sizeof( $actions ); }}  updates
						
					@else
					
						{{ sizeof( $actions ); }} update
						
					@endif
				
				</li>
				
				<li><span class="icon-project"></span> {{ StopwatchFacade::fetch($query['id']); }} </li>
				
			</ul>
			
		</div>
				
	</div>		
	
	<div class="chalk-lines-75">
	
		
		{{-- Pick Proper Timer Form. ------------------------}}
		
		<?php
			
			$timer_status = StopwatchFacade::status($query['id']);
			
			switch($timer_status )
			{
				case 'started': #tracking
					
					?>
					
					{{-- Create Time Form. ------------------------}}
						
						{{ Form::open(array('url' => '/timer/'.$query['id'], 'method' => 'put', 'class'=>'clean') ) }}
							
							{{-- Project ID ------------------------}}
							
							{{ Form::hidden('id', $query['id'] )  }}
							
							{{-- Submit Button. ------------------------}}
							
							<div class="formElement submit">
									
							{{ Form::submit('Stop Timer', ['class' => 'danger']) }}
							
							<h4>extras - notes and whatever. So ya.</h4>
							
							</div>
					
						{{ Form::close() }}
	
					<?php
					
				break;
				default:
				?>
			
				{{-- Create Time Form. ------------------------}}
				
				{{ Form::open(array('url' => '/timer', 'class'=>'clean')) }}
					
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
	
	<div class="chalk-lines-25">
		
		<div class="panel">
		
			<ul>
			
				<li class="active"><a href="/projects/{{ $query['id'] }}">Project</a></li>
				
				<li><a href="/projects/{{ $query['id'] }}/edit">Edit</a></li>
				
				<li><a class="" href="/projects/{{$query['id']}}/edit/settings">Settings</a></li>
				
			</ul>	
		
		</div>
	
	</div>
	
@stop 


	