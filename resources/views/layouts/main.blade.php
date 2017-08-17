<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Laravel 5 </title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
	<link rel="stylesheet" type="text/css" href="http://labfile.oss.aliyuncs.com/bootstrap/3.3.2/css/bootstrap.min.css">
    </head>
    <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
	    <a class="navbar-brand hidden-sm" href="/">Laravel</a>
	</div>
	<ul class="nav navbar-nav navbar-right hidden-sm">
@if(!Auth::check())
	    <li>
	        <a href="{{ URL::action('UsersController@getRegister')}}" title="">Register</a>
	    </li>
	    <li>
	        <a href="{{ URL::action('UsersController@getLogin')}}" title="">Login</a>
</li>
@else
	    <li>
	        <a href="{{ URL::action('UsersController@getLogout')}}" title="">Logout</a>
	   </li>
@endif
	</ul>
    </div>
    <div class="container">
        @if(Session::has('message'))
	<p class="alert">{{ Session::get('message') }}</p>
	@endif
        @yield('content')
    </div>

    </body>
</html>
