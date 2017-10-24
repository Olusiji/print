<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
	<title>Dashboard | @yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('vendor_assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor_assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor_assets/vendor/linearicons/style.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor_assets/vendor/chartist/css/chartist-custom.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('vendor_assets/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ asset('vendor_assets/css/demo.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('vendor_assets/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('vendor_assets/img/favicon.png') }}">


</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="{{ asset('vendor_assets/img/logo-dark.png') }}" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				

				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>{{Auth::user()->studio_name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="{{ route('user.profile.edit') }}"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
									<li><a href="{{ route('logout') }}"
	                                            onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();"><i class="lnr lnr-exit"></i> <span>Logout</span></a>
	                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
	                                </li>
								</ul>
							</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{ route('user.profile.edit') }}" class="@yield('profile_nav_class')"><i class="lnr lnr-user"></i> <span>Profile</span></a></li>
						<li><a href="{{ route('user.jobs') }}" class="@yield('jobs_nav_class')"><i class="lnr lnr-briefcase"></i> <span>Jobs</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					@yield('content')

					
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{ asset('vendor_assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('vendor_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('vendor_assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('vendor_assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('vendor_assets/vendor/chartist/js/chartist.min.js') }}"></script>
	<script src="{{ asset('vendor_assets/scripts/klorofil-common.js') }}"></script>

	<!-- CUSTOM PRINTSHOP JS  -->
	<script src="{{ asset('js/printshop.js') }}"></script>
</body>

</html>
