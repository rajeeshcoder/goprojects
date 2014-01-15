@if (Sentry::check() && Sentry::getUser()->hasAccess(['admin']) )
	<ul class="nav">
		<li class="{{ Request::is('admin/manufacturers*') ? 'active' : null }}"><a href="{{ URL::route('admin.manufacturers.index') }}"><i class="icon-book"></i> manufacturers</a></li>
		<li><<a href="#"><i class="icon-book"></i>Logged in as: {{ Sentry::getUser()->email }}</a></li>
		<li><a href="{{ URL::route('admin.logout') }}"><i class="icon-lock"></i> Logout</a></li>
	</ul>
@endif
