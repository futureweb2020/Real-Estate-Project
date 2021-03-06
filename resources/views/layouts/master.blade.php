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
		<link rel="stylesheet" type="text/css" media="screen" href="{{url('/')}}/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="{{url('/')}}/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="{{url('/')}}/css/style.css">
		

	</head>

	<body>
		<div id="sidebar">
			@if(Auth::guest())
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation"><a href="{{url('/')}}/login">Login</a></li>
					<li role="presentation"><a href="{{url('/')}}/register">Sign up</a></li>
				</ul>
			@elseif(Auth::user()->type == 1)
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation"><a href="{{url('/')}}/landlord/dashboard">Dashboard</a></li>
					<li role="presentation"><a href="{{url('/')}}/landlord/property">Properties</a></li>
					<li role="presentation"><a href="{{url('/')}}/landlord/accounting">Accounting</a></li>
					<li role="presentation"><a href="{{url('/')}}/landlord/contacts">Contacts</a></li>
					<li role="presentation"><a href="{{url('/')}}/landlord/reports">Reports</a></li>
					<li role="presentation"><a href="{{url('/')}}/landlord/maintenance">Maintenance</a></li>
					<li role="presentation"><a href="{{url('/')}}/landlord/applications">Applications</a></li>
					<li role="presentation"><a href="{{url('/')}}/landlord/webiste">Website</a></li>
					<li role="presentation"><a href="{{url('/')}}/logout">Logout</a></li>
				</ul>
			@else
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation"><a href="{{url('/')}}/tenant/dashboard">Dashboard</a></li>
					<li role="presentation"><a href="{{url('/')}}/tenant/rent">Rent</a></li>
					<li role="presentation"><a href="{{url('/')}}/tenant/myrental">My Rental</a></li>
					<li role="presentation"><a href="{{url('/')}}/tenant/repairs">Fix it</a></li>
					<li role="presentation"><a href="{{url('/')}}/tenant/applications">Applications</a></li>
					<li role="presentation"><a href="{{url('/')}}/tenant/profile">About me</a></li>
					<li role="presentation"><a href="{{url('/')}}/logout">Logout</a></li>
				</ul>
			@endif
		</div>

		<div class="content">
			@if(Session::has('error'))
				<div class="alert alert-danger alert-dismissible" role="alert">
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  					<p class="text-center">
	  					<strong>Error!</strong> {{Session::get('error')}}
	  				</p>
				</div>
				<?php Session::forget('error'); ?>
			@endif
			@if(Session::has('success'))
				<div class="alert alert-success alert-dismissible" role="alert">
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  					<p class="text-center">
	  					<strong>Success!</strong> {{Session::get('success')}}
	  				</p>
				</div>
				<?php Session::forget('success'); ?>
			@endif

			@yield('content')
			
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="{{url('/')}}/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>