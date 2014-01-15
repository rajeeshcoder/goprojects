<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Car Service</title>

        @include('common.includes.assets')
</head>
<body>
	<div class="container">
	    @include('user._partials.header')
	        <div class="container">
		      @if(Session::has('message'))
		          <p class="alert">{{ Session::get('message') }}</p>
		      @endif
			</div>
	    @yield('main')
	</div>
</body>
</html>