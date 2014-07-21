<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chalkbox</title>
</head>
<body> 
	@if(Auth::check())
       Logged in as
       <strong>{{{Auth::user()->username}}}</strong>
       {{link_to('logout', 'Sign Out')}}
     @else
       {{link_to('signin', 'Sign In')}}
    @endif
	
	@yield('body')
</body>
</html>
