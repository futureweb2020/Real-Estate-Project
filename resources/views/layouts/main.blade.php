<!DOCTYPE html>
<html lang="en-us" class="no-js">
	<head>
	
		<meta charset="utf-8">
		<title> Real Estate</title>
		<meta name="description" content="">
		<meta name="author" content="">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- #CSS Links -->
		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{url('/')}}/styles/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="{{url('/')}}/styles/css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{url('/')}}/styles/css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="{{url('/')}}/styles/css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="{{url('/')}}/styles/css/smartadmin-skins.min.css">
		
		<link rel="stylesheet" type="text/css" media="screen" href="{{url('/')}}/styles/css/smartadmin-angular.css">

		<!-- SmartAdmin RTL Support (Not using RTL? Disable the CSS below to save bandwidth) -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{url('/')}}/styles/css/smartadmin-rtl.min.css">

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<link rel="stylesheet" type="text/css" media="screen" href="{{url('/')}}/css/style.css">

	</head>

	<body>
		<aside id="left-panel">
			<!-- User info -->
			<!-- <div class="login-info">					
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="img/avatars/sunny.png" alt="me" class="online" /> 
						<span>
							john.doe 
						</span>
						<i class="fa fa-angle-down"></i>
					</a> 
					
				</span>
			</div> -->
			<!-- end user info -->



			<nav>
				<!-- 
				NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional href="" links. See documentation for details.
				-->

				@if(Auth::guest())
					<ul>
						<li><a href="{{url('/')}}" title="Home"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Home</span></a></li>
						<li><a href="{{url('login')}}" title="Login"><i class="fa fa-lg fa-fw fa-sign-in"></i> <span>Login</span></a></li>
						<li><a href="{{url('register')}}" title="Register"><i class="fa fa-lg fa-fw fa-pencil"></i> <span>Register</span></a></li>
					</ul>
				@else
					<ul>
						<li><a href="{{url('/')}}/landlord/dashboard" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a></li>
						<li><a href="{{url('landlord/property')}}" title="Property"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Property</span></a></li>
						<!-- <li><a href="{{url('landlord/leases')}}" title="Leases"><i class="fa fa=lg fa-fw fa-pencil"></i> <span class="menu-item-parent">Leases</span></a></li> -->
					</ul>
				@endif
			</nav>

			<span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span>
		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">
			<!-- RIBBON -->
			<div id="ribbon">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<!-- <li>Home></li><li>Forms</li><li>Smart Form Layouts</li> -->
				</ol>
				<!-- end breadcrumb -->
			</div>

			<!-- MAIN CONTENT -->
			<div id="content">
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
						<h1 class="page-title txt-color-blueDark">
							@yield('pagetitle')
							<span> @yield('pagesubtitle') </span>
						</h1>
					</div>
				</div>

				@if(Session::has('success'))
					<div class="alert alert-block alert-success">
						<a class="close" data-dismiss="alert" href="#">×</a>
						<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Success!</h4>
						<p>
							{{Session::get('success')}}
						</p>
					</div>
				@endif
				@if(Session::has('error'))
					<div class="alert alert-block alert-danger">
						<a class="close" data-dismiss="alert" href="#">×</a>
						<h4 class="alert-heading"><i class="fa fa-times-circle-o"></i> Error!</h4>
						<p>
							{{Session::get('error')}}
						</p>
					</div>
				@endif

				<!-- widget grid -->
				<section id="widget-grid" class="">
					<!-- START ROW -->
					<div class="row">
						@yield('content')
					</div>
				</section>
			</div>
		</div>

		@yield('modal')

		<script src="{{url('/')}}/build/vendor.js"></script>
		@yield('script')
	</body>
</html>