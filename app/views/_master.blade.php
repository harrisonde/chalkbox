<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chalkbox</title>
</head>
<body> 
	@if(Auth::check())
       Logged in as
       <strong>{{{Auth::user()->email}}}</strong>
       {{link_to('projects', 'Projects')}}
       {{link_to('signout', 'Sign Out')}}
     @else
       {{link_to('/', 'Home')}}
       {{link_to('register', 'Register')}}
       {{link_to('signin', 'Sign In')}}
    @endif
	
	@yield('body')
</body>
</html>