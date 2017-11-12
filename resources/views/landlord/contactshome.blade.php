@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<ul class="nav nav-tabs">
			<li role="presentation"><a href="#tenants">Tenants</a></li>
			<li role="presentation"><a href="#owners">Owners</a></li>
			<li role="presentation"><a href="#servicepros">Service Pros</a></li>
			<li role="presnetation"><a href="#vendors">Vendors</a></li>
		</ul>
		<div id="tenants">
			<h2>Tenants</h2>
		</div>
		<div id="owners">
			<h2>owners</h2>
		</div>
	</div>
</div>
@endsection