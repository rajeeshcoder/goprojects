<div class="navbar-collapse collapse">
	<ul class="nav navbar-nav">
		@if (Sentry::check() && Sentry::getUser()->hasAccess(['customer']) )
			<li class="{{ Request::is('customer/profile*') ? 'active' : null }}"><a href="{{ URL::route('customer.profiles.index') }}"><i class="icon-user"></i>Profile</a></li>
			<li class="{{ Request::is('customer/vehicles*') ? 'active' : null }}"><a href="{{ URL::route('customer.vehicles.index') }}"><i class="icon-move"></i>Vehicles</a></li>
			<li class="{{ Request::is('customer/bookings*') ? 'active' : null }}"><a href="{{ URL::route('customer.bookings.index') }}"><i class="icon-road"></i>Booking</a></li>
			<li class="{{ Request::is('customer/services*') ? 'active' : null }}"><a href="{{ URL::route('customer.services.index') }}"><i class="icon-pencil"></i>Services</a></li>
		@else 
	       <li>{{ HTML::link('customer/register', 'Register') }}</li>  
	       <li>{{ HTML::link('customer/login', 'Login') }}</li>
		@endif		
	</ul>
@if (Sentry::check() && Sentry::getUser()->hasAccess(['customer']) )
<ul class="nav navbar-nav navbar-right">
	<!---->p class="navbar-text pull-right">
	<li><a href="#"><i class="icon-user"></i>Logged in as: {{ Sentry::getUser()->email }}</a></li>
	<li><a href="{{ URL::route('customer.logout') }}"><i class="icon-lock"></i> Logout</a></li>
	<!--</p>-->
</ul>	
@endif	
</div>

