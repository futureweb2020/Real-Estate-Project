@extends('layouts.main')

<?php
	$property = App\Property::find($unit->property_id);
	$lease = App\Lease::where('unit_id','=',$unit->id)->orderBy('id','DESC')->first();
?>

@section('content')
<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
		<h2>Edit unit </h2>
	</header>

	<!-- widget div-->
	<div>
		<!-- widget edit box -->
		<div class="jarviswidget-editbox">
			<!-- This area used as dropdown edit box -->
		</div>
		<!-- end widget edit box -->
		
		<!-- widget content -->
		<div class="widget-body no-padding">
			<div class="row">
				<div class="col-md-6 col-md-offset-1">
					<legend>Property information</legend>
					<p><strong>{{$unit->address}}</strong></p>
					<legend>Lease information</legend>
					@if($lease && $lease->status = 'active')
						<p><strong>Status: <span class="text-success">Active</span></strong>
						<p><strong>Active Tenant:</strong> {{App\Lease::parse_tenant($lease->tenant)}} ({{App\Lease::parse_phone($lease->tenant)}}) {{App\Lease::parse_email($lease->tenant)}}</p>
						<p><strong>Effective Dates:</strong> {{$lease->start}} to {{$lease->end}}</p>
						<p><strong>Rent:</strong> {{$lease->rent}}</p>
						<p><strong>Deposit:</strong> {{$lease->deposit}}</p>
					@elseif($lease)
						<p><strong>Status: <span class="text-danger">Terminated</span></strong>
						<p><strong>Past Tenant:</strong> {{App\Lease::parse_tenant($lease->tenant)}} ({{App\Lease::parse_phone($lease->tenant)}}) {{App\Lease::parse_email($lease->tenant)}}</p>
						<p><strong>Past Effective Dates:</strong> {{$lease->start}} to {{$lease->end}}</p>
						<p><strong>Past Rent:</strong> {{$lease->rent}}</p>
						<p><strong>Past Deposit:</strong> {{$lease->deposit}}</p>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-1">
					<form method="post" name="add" class="smart-form" novalidate="novalidate">
						<header>
							Unit information
						</header>

						<fieldset>
							<section class="col col-md-2">
								<label class="label">Unit #</label>
								<label class="input"> <i class="icon-prepend fa fa-fw fa-home"></i>
									<input type="text" name="unit_number" value="{{$unit->number}}" placeholder="Unit #">
								</label>
							</section>
							<section class="col col-md-2">
								<label class="label">Square footage</label>
								<label class="input"> <i class="icon-prepend fa fa-fw fa-retweet"></i>
									<input type="text" name="unit_footage" value="{{$unit->footage}}" placeholder="Sq Ft">
								</label>
							</section>
							<section class="col col-md-2">
								<label class="label">Beds</label>
								<label class="select"> <i></i>
									<select name="unit_beds">
										<option value="-1">Beds</option>
										@if($unit->beds == 1)
											<option value="1" selected>1</option>
										@else
											<option value="1">1</option>
										@endif
										@if($unit->beds == 1.5)
											<option value="1.5" selected>1.5</option>
										@else
											<option value="1.5">1.5</option>
										@endif
										@if($unit->beds == 2)
											<option value="2" selected>1</option>
										@else
											<option value="2">2</option>
										@endif
										@if($unit->beds == 2.5)
											<option value="2.5" selected>2.5</option>
										@else
											<option value="2.5">2.5</option>
										@endif
										@if($unit->beds == 3)
											<option value="3" selected>3</option>
										@else
											<option value="3">3</option>
										@endif
										@if($unit->beds == 3.5)
											<option value="3.5" selected>3.5</option>
										@else
											<option value="3.5">3.5</option>
										@endif
										@if($unit->beds == 4)
											<option value="4" selected>4</option>
										@else
											<option value="4">4</option>
										@endif
										@if($unit->beds == 4.5)
											<option value="4.5" selected>4.5</option>
										@else
											<option value="4.5">4.5</option>
										@endif
										@if($unit->beds == 5)
											<option value="5" selected>5</option>
										@else
											<option value="5">5</option>
										@endif
										@if($unit->beds == 5.5)
											<option value="5.5" selected>5.5</option>
										@else
											<option value="5.5">5.5</option>
										@endif
										@if($unit->beds == 6)
											<option value="6" selected>6</option>
										@else
											<option value="6">6</option>
										@endif
										@if($unit->beds == 6.5)
											<option value="6.5" selected>6.5</option>
										@else
											<option value="6.5">6.5</option>
										@endif
										@if($unit->beds == 7)
											<option value="7" selected>7</option>
										@else
											<option value="7">7</option>
										@endif
									</select>
								</label>
							</section>
							<section class="col col-md-2">
								<label class="label">Baths</label>
								<label class="select"> <i></i>
									<select name="unit_baths">
										<option value="-1">Baths</option>
										@if($unit->baths == 1)
											<option value="1" selected>1</option>
										@else
											<option value="1">1</option>
										@endif
										@if($unit->baths == 1.5)
											<option value="1.5" selected>1.5</option>
										@else
											<option value="1.5">1.5</option>
										@endif
										@if($unit->baths == 2)
											<option value="2" selected>1</option>
										@else
											<option value="2">2</option>
										@endif
										@if($unit->baths == 2.5)
											<option value="2.5" selected>2.5</option>
										@else
											<option value="2.5">2.5</option>
										@endif
										@if($unit->baths == 3)
											<option value="3" selected>3</option>
										@else
											<option value="3">3</option>
										@endif
										@if($unit->baths == 3.5)
											<option value="3.5" selected>3.5</option>
										@else
											<option value="3.5">3.5</option>
										@endif
										@if($unit->baths == 4)
											<option value="4" selected>4</option>
										@else
											<option value="4">4</option>
										@endif
										@if($unit->baths == 4.5)
											<option value="4.5" selected>4.5</option>
										@else
											<option value="4.5">4.5</option>
										@endif
										@if($unit->baths == 5)
											<option value="5" selected>5</option>
										@else
											<option value="5">5</option>
										@endif
										@if($unit->baths == 5.5)
											<option value="5.5" selected>5.5</option>
										@else
											<option value="5.5">5.5</option>
										@endif
										@if($unit->baths == 6)
											<option value="6" selected>6</option>
										@else
											<option value="6">6</option>
										@endif
										@if($unit->baths == 6.5)
											<option value="6.5" selected>6.5</option>
										@else
											<option value="6.5">6.5</option>
										@endif
										@if($unit->baths == 7)
											<option value="7" selected>7</option>
										@else
											<option value="7">7</option>
										@endif
									</select>
								</label>
							</section>
							<section class="col col-md-2">
								<label class="label">Rent</label>
								<label class="input"> <i class="icon-prepend fa fa-fw fa-usd"></i>
									<input type="text" name="unit_rent" value="{{$unit->rent}}" placeholder="$ Rent">
								</label>
							</section>
						</fieldset>

						<input type="hidden" id="submit" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" id="id" value="{{$unit->id}}">

						<footer>
							<button type="submit" class="btn btn-primary">
								Update unit
							</button>
						</footer>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

