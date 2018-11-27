<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<script src="{{ asset('/js/app.js') }}"></script>
	@yield('myScript')
</head>
    <body>
    	<nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-between" >
    		<a class="navbar-brand" href="#">Navbar</a>
		    
    		@guest
	    		<form class="form-inline">
		    		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    			<ul class="navbar-nav mr-auto">
			                <li class="nav-item active"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
			           
			            	<li class="nav-item active">
			                @if (Route::has('register'))
			                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
			                @endif
			            	</li>
			            </ul>
			        </div>
			    </form>
    		@else
	    		<div class="form-inline my-2 my-lg-0">	
	    			<ul class="navbar-nav mr-auto">
		    			<li class="nav-item active">
				    		<a class="nav-link" href="{{ route('logout') }}"
				               onclick="event.preventDefault();
				                             document.getElementById('logout-form').submit();">
				                {{ __('Logout') }}
				            </a>
			            </li>
			            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                @csrf
			            </form>
		        	</ul>
	    		</div>
    		@endguest
    	</nav>

    	<div class="container pt-5">
            @yield('content')
        </div>
    </body>
</html>