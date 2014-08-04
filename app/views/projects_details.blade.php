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
				
				<li><span class="icon-project"></span> {{ StopwatchFacade::fetch($query['id']); }} <span class="helper">Time Total</span></li>
				
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
									
							{{ Form::submit('Stop Timer', ['class' => 'danger']) }}  <span class="helper">Stop tracking my time.</span>
							
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
							
						{{ Form::submit('+ Start Timer', ['class' => 'action']) }} <span class="helper">Track my time.</span>
					
					</div>
					
				{{ Form::close() }}
					
				
				<?php
				
				break;
			}
		?>
	
				

			<ul class="accordion-tabs-minimal">
		        <li class="tab-header-and-content">
		            <a href="#" class="tab-link is-active">Notes</a>
					
					
		
		            <div class="tab-content">
		            	@if(isset($notes))
		            		
		            		<p>
		            		
		            		@foreach($notes as $note)
		            			
		            			<a onclick="CHALKBOX.communicate.get({{$note['id']}}); return false;" href="#">{{ $note['title'] }}</a><br/>
		            		
		            		@endforeach
		            		
		            		</p>
		            	@else
		            		
		            		<p>No notes attached to project.</p>
		            		
		            	@endif
		                
		            </div>
		        </li>
		
		        <li class="tab-header-and-content">
		            
		            <a href="#" class="tab-link">+ New Note</a>
		
		            <div class="tab-content">
		            
		            	{{-- Create Note Form. ------------------------}}
				
						{{ Form::open(array('url' => '/note', 'class'=>'bare')) }}
							
							{{-- Project ID ------------------------}}
							
							{{ Form::hidden('id', $query['id'] )  }}
							
							{{ Form::hidden('project_title', $query['name'] )  }}
							
							<div class="formElement title">
			
							{{ Form::label('Title:') }}
							
							{{ Form::text('title', Input::Old('title')) }}
							
							</div>
							
							<div class="formElement content">
			
							{{ Form::label('Content:') }}
							
							{{ Form::textarea('content', Input::Old('content')) }}
							
							</div>
							
							{{-- Submit Button. ------------------------}}
							
							<div class="formElement submit">
									
								{{ Form::submit('+ New Note') }} 						
							
							</div>
							
						{{ Form::close() }}

		            </div>
		        </li>
		
		 </ul>






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


	