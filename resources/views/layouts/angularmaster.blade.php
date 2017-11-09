<!DOCTYPE html>
<html lang="en-us" class="no-js" ng-app="app">
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
	</head>

	<body 	data-smart-device-detect
			data-smart-fast-click
			data-smart-layout
			data-smart-page-title="SmartAdmin AngularJS">

		<div id="sidebar">
			@if(Auth::user()->type == 1)
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
			<div data-ui-view="root"  data-autoscroll="false"></div>
		</div>

		<script src="build/vendor.js"></script>
		<script src="build/eljon.js"></script>
	</body>
</html>