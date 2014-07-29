<!doctype html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<title>Chalkbox</title>
	
	<link rel="stylesheet" href="/styles/styles.css" type="text/css">

</head>

<body id="chalkbox"> 
	
			
	{{-- Navigation. ------------------------}}	
	
	<header class="navigation">	
	
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
			   
			   		<li class="user"><p>Logged in as {{{Auth::user()->email}}} </p></li>
	     
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
		
		@yield('body')

	</div>
	
	<footer>
		
		<ul>

			<li>© 2014 Chalkbox</li>
			
			<li><a href="https://www.facebook.com/harrison.destefano">Creator</a></li>
			
		</ul>
		
		<img src="/images/chalkbox@2x.png" alt="chalkbox@2x" width="55" height="55">
		
		<ul>

			 <li>{{link_to('register', 'Register')}}</li>
	    
	         <li>{{link_to('signin', 'Sign In')}}</li>

		</ul>
		
	</footer>
</body>

</html>