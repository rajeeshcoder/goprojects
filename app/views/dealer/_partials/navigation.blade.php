@if (Sentry::check() && Sentry::getUser()->hasAnyAccess(['view']) )
	<ul class="nav">
		<li class="{{ Request::is('dealer/centers*') ? 'active' : null }}"><a href="{{ URL::route('dealer.centers.index') }}"><i class="icon-book"></i> Bookings</a></li>
		<li class="pull-right"><a href="#"> Logged in as: {{ Sentry::getUser()->email }}</a></li>
		<li class="pull-right"><a href="{{ URL::route('dealer.logout') }}"><i class="icon-lock"></i> Logout</a></li>
	</ul>
@endif
