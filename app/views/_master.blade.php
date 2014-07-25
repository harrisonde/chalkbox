<!doctype html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<title>Chalkbox</title>

</head>

<body> 
	
			
	{{-- Navigation. ------------------------}}
	
	{{link_to('/', 'Chalkbox')}}
	 
	@if(Auth::check())
    
       Logged in as
	   
       <strong>{{{Auth::user()->email}}}</strong>
    
       {{link_to('projects', 'Projects')}}
    
       {{link_to('signout', 'Sign Out')}}
    
     @else
    
       {{link_to('register', 'Register')}}
    
       {{link_to('signin', 'Sign In')}}
    
    @endif
	
			
	{{-- Render Templates. ------------------------}}
	
	@yield('body')

</body>

</html>