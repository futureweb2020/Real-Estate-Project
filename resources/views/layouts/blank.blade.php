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
		<link rel="stylesheet" type="text/css" media="screen" href="styles/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="styles/css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="styles/css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="styles/css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="styles/css/smartadmin-skins.min.css">
		
		<link rel="stylesheet" type="text/css" media="screen" href="styles/css/smartadmin-angular.css">

		<!-- SmartAdmin RTL Support (Not using RTL? Disable the CSS below to save bandwidth) -->
		<link rel="stylesheet" type="text/css" media="screen" href="styles/css/smartadmin-rtl.min.css">

		<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">

	</head>

	<body>
		<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

		<header class="blank-header">
			<div class="container">
				<div class="row">
					<span class="close-x"></span>
					<div classs="col-md-12">
						<h2 class="text-center">Real Estate</h2>
					</div>
				</div>
			</div>
		</header>

		<article>
			<div class="container">
				@if(Session::has('success'))
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<div class="alert alert-block alert-success">
								<a class="close" data-dismiss="alert" href="#">×</a>
								<h4 class="alert-heading">Success!</h4>
								{{Session::get('success')}}
								<?php Session::forget('success'); ?>
							</div>
						</div>
					</div>
				@endif
				@if(Session::has('error'))
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<div class="alert alert-block alert-danger">
								<a class="close" data-dismiss="alert" href="#">×</a>
								<h4 class="alert-heading">Error!</h4>
								{{Session::get('error')}}
								<?php Session::forget('error'); ?>
							</div>
						</div>
					</div>
				@endif
				@if(Session::has('warning'))
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<div class="alert alert-block alert-warning">
								<a class="close" data-dismiss="alert" href="#">×</a>
								<h4 class="alert-heading">Warning!</h4>
								{{Session::get('warning')}}
								<?php Session::forget('warning'); ?>
							</div>
						</div>
					</div>
				@endif
				@if(Session::has('info'))
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<div class="alert alert-block alert-info">
								<a class="close" data-dismiss="alert" href="#">×</a>
								<h4 class="alert-heading">Info!</h4>
								{{Session::get('info')}}
								<?php Session::forget('info'); ?>
							</div>
						</div>
					</div>
				@endif
			</div>
			@yield('content')
		</article>

		<!--[if lt IE 9]>
			<script src="plugin/es5-shim/es5-shim.js"></script>
			<script src="plugin/json3/lib/json3.min.js"></script>
		<![endif]-->

		<script src="build/vendor.js"></script>
	</body>
</html>