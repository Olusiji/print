@if (Auth::guard('web')->check())
	<p class="text-success">
		You are logged in as a <strong>USER</strong>
	</p>
@else
	<p class="text-danger">
		You are logged out as a <strong>USER</strong>
	</p>
@endif

@if (Auth::guard('vendor')->check())
	<p class="text-success">
		You are logged in as a <strong>VENDOR</strong>
	</p>
@else
	<p class="text-danger">
		You are logged out as a <strong>VENDOR</strong>
	</p>
@endif