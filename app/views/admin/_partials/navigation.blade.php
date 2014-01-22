@if (Sentry::check() && Sentry::getUser()->hasAccess(['admin']) )
	<ul class="nav">
		<li class="{{ Request::is('admin/manufacturers*') ? 'active' : null }}"><a href="{{ URL::route('admin.manufacturers.index') }}"><i class="icon-book"></i> Manufacturers</a></li>
		<li class="{{ Request::is('admin/models*') ? 'active' : null }}"><a href="{{ URL::route('admin.models.index') }}"><i class="icon-cog"></i> Models</a></li>
		<li class="{{ Request::is('admin/dealers*') ? 'active' : null }}"><a href="{{ URL::route('admin.dealers.index') }}"><i class="icon-th-large"></i> Dealers</a></li>
		<li class="{{ Request::is('admin/service_centers*') ? 'active' : null }}"><a href="{{ URL::route('admin.service_centers.index') }}"><i class="icon-fire"></i> Service Centers</a></li>
				<li class="pull-right"><a href="#"> Logged in as: {{ Sentry::getUser()->email }}</a></li>
		<li class="pull-right"><a href="{{ URL::route('admin.logout') }}"><i class="icon-lock"></i> Logout</a></li>
	</ul>
@endif
