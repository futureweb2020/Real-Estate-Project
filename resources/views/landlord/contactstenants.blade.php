@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<ul class="nav nav-tabs">
			<li role="presentation"><a href="#tenants" data-toggle="tab">Tenants</a></li>
			<li role="presentation"><a href="#owners" data-toggle="tab">Owners</a></li>
			<li role="presentation"><a href="#servicepros" data-toggle="tab">Service Pros</a></li>
			<li role="presnetation"><a href="#vendors" data-toggle="tab">Vendors</a></li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane fade" id="tenants">
				<a href="{{url('/')}}/landlord/contacts/tenants/add" class="btn btn-primary">Add new tenant</a>
			</div>
			<div class="tab-pane fade" id="owners">
				<a href="{{url('/')}}/landlord/contacts/owners/add" class="btn btn-primary">Add new owner</a>
			</div>
			<div class="tab-pane fade" id="servicepros">
				<a href="{{url('/')}}/landlord/contacts/servicepros/add" class="btn btn-primary">Add new servicepro</a>
			</div>
			<div class="tab-pane fade" id="vendors">
				<a href="{{url('/')}}/landlord/contacts/vendors/add" class="btn btn-primary">Add new vendor</a>
			</div>
		</div>
	</div>
</div>
@endsection