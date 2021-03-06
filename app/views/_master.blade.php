<!doctype html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<title>Chalkbox</title>
	
	<link rel="stylesheet" href="/styles/styles.css" type="text/css">
	
	<script src="<?php echo URL::asset('/script/vendor/jquery/jQuery-10.1.2.js'); ?>" type="text/javascript"></script> 
	
	<script src="<?php echo URL::asset('/script/chalkbox.js'); ?>" type="text/javascript"></script> 

</head>

<body id="chalkbox"> 
			
	{{-- Navigation. ------------------------}}	
	
	<header class="navigation" role="navigation">	
		
		<a id="nav-open-btn" href="#nav">Chalkbox Navigation</a>
		
		<div class="brand">
		
			 {{-- Logo. --}}
			 
			 <a href=" {{url('/', $parameters = array(), $secure = null) }}" class="logo">
				 
				 <img src="/images/chalkbox@2x.png" alt="Chalkbox Logo">
				 
			 </a>
		 
		</div>
	
		@if(Auth::check())
	    
	    	<div class="project-search">
	    	
	    		{{-- Search Form. ------------------------}}
		
				{{ Form::open( array('url' => 'search')) }}
				
						{{ Form::text('search', Input::old('search'),  array('placeholder'=>'Project Name')) }}
				
				{{ Form::close() }} 

	    	</div>
	    	
	    	{{-- Anchors. ------------------------}}
	    	
			<div class="user-private">	
			
			   <ul>
		       
				   <li>{{link_to('projects', 'Projects')}}</li>
		    
		           <li>{{link_to('signout', 'Sign Out')}}</li>
		      
			   </ul>
			
			</div> 
			
			<div class="user-info">
			   
			   <ul>
			   		
			   		<li><?php echo Gravatar::image( Auth::user()->email); ?> {{{Auth::user()->email}}}</li>
		 
			   </ul>
			   
			</div>
			
	     @else
	     	
	     	{{-- Anchors. ------------------------}}
	     	
			<div class="uri-public">
			
				<ul>
				
					<li>{{link_to('register', 'Register')}}</li>
				
					<li>{{link_to('signin', 'Sign In')}}</li>
				
				</ul>
			
			</div>
			
	    @endif
		
	</header>
			
	{{-- Render Templates. ------------------------}}

	<div id="chalk">
		
		{{-- Validation. ------------------------}}
		
		@if(sizeof($errors) > 0)
			
				<ul class="errors">
				
				Please correct the error(s) below:
				
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

		 {{-- Body. ------------------------}}
		 
		@yield('body')

	</div>
	
	<footer>
		
		<div class="left">
		
			<ul>
		
				<li>© 2014 Chalkbox</li>
				
				<li><a href="https://www.facebook.com/harrison.destefano">Creator</a></li>
				
			</ul>

		</div>
		
		<div class="center">
			
			<a href=" {{url('/', $parameters = array(), $secure = null) }}" class="logo">
			
				<img src="/images/chalkbox@2x.png" alt="chalkbox@2x" width="55" height="55">
		
			</a>
		
		</div>
		
		<div class="right">
		
			<ul>
				
				{{-- Anchors. ------------------------}} 
	
				 @if(Auth::check())
	    
				 
	    		   
	    	
	    	{{-- Anchors. ------------------------}}
			
			<ul>
			
			   <li>{{link_to('projects', 'Projects')}}</li>
			
			   <li>{{link_to('signout', 'Sign Out')}}</li>
			
			</ul>
			
			
			@else
			
			{{-- Anchors. ------------------------}}
			
			<ul>
			
				<li>{{link_to('register', 'Register')}}</li>
			
				<li>{{link_to('signin', 'Sign In')}}</li>
			
			</ul>
			
			@endif
	
			</ul>
		
		</div>
	
	</footer>

	<!-- clide side scripts -->
	<script>
		// load
		$(document).ready( function(){
			// do not clobber 
			CHALKBOX.init();
		});
	</script>

</body>

</html>