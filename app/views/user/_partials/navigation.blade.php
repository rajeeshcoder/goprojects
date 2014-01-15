<ul class="nav">
	<li class="{{ Request::is('/*') ? 'active' : null }}"><a href="{{ URL::route('home') }}"><i class="icon-book"></i>Services</a></li>
	@if (Sentry::check() && Sentry::getUser()->hasAccess(['user']) )		
		<li><i class="icon-user"></i>Logged in as: {{ Sentry::getUser()->email }}</li>
		<li><a href="{{ URL::route('user.logout') }}"><i class="icon-lock"></i> Logout</a></li>
	@endif		
</ul>

