<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Car Service</title>
    @include('common.includes.assets')
    @include('customer.includes.assets')

</head>
<body>
@include('customer._partials.header')
<div class="wrapper">
	<div class="container">
		<div class="row-fluid">
			<div class="span12">
			      @if(Session::has('message'))
			          <p class="alert">{{ Session::get('message') }}</p>
			      @endif
			</div>
		</div>
	<!--
		<div class="row-fluid">
			<div class="span12">
				 <div class="alert alert-info">
				    <h1>Profile</h1> 
				    <h4>You can a create maximum of three profiles. You can select any of these profiles during service booking</h4>
			 	</div>
			</div>
		</div>
	-->
		<div class="row">
			<div class="span1">
			</div>	
			<div class="span11">
	 			@yield('main')
		 	</div>
		</div>
	</div>
</div>
<footer>
	<div class="container">
		<div class="row">
		<div class="col-md-3">
			<a href="http://www.dashwheel.com/aboutus" rel="author">About Us</a>
		</div>
		<div class="col-md-3">
			<a href="http://www.dashwheel.com/contactus" rel="external">Contact</a>
	 	</div>
	 	<div class="col-md-3">
		 	<a href="http://www.dashwheel.com/privacy" rel="external">Privacy</a>
	 	</div>
	 	<div class="col-md-3">
		 	<a href="http://www.dashwheel.com/disclaimer">Discalimer</a>
	 	</div>
	 </div>
	</div>
</footer>
</body>
</html>