@extends('layouts.master')

<?php
	$insurance_info = App\Property::parse_property_data($prop->insurance_info);
	$unit_info = App\Property::parse_property_data($prop->unit_info);
	$owner_info = App\Property::parse_property_data($prop->owner_stats);
	$amenities = App\Property::parse_property_data($prop->amenities);
?>

@section('content')
<div class="container">
	<form id="propertyadd" method="post" class="col-md-6">
		<div class="row">
			<h2>Add Property</h2>
			<div class="col-md-6">
				<div class="form-group">
					<label>Property name</label>
					<input type="text" class="form-control" name="name" id="name" value="{{$prop->name}}" required>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Year built</label>
					<input type="text" class="form-control" name="year" value="{{$prop->year}}" id="year">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>MLS #</label>
					<input type="text" class="form-control" name="mls" value="{{$prop->mls}}" id="mls">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Street address</label>
					<input type="text" class="form-control" name="street" value="{{$prop->street}}" id="street" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>City</label>
					<input type="text" class="form-control" name="city" value="{{$prop->city}}" id="city" required>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>County</label>
					<input type="text" class="form-control" name="county" value="{{$prop->county}}" id="county">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>State</label>
					<input type="text" class="form-control" name="state" value="{{$prop->state}}" id="state" required>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Zip</label>
					<input type="text" class="form-control" name="postal" value="{{$prop->postal}}" id="postal" required>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Country</label>
					<input type="text" class="form-control" name="country" value="{{$prop->country}}" id="country" required>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Building amenities</label>
				</div>
				<div class="form-group">
					<div class="col-md-4">
						<div class="checkbox">
							<label>
								@if(in_array("club_house",$amenities))
									<input type="checkbox" name="club_house" value="9999" checked="checked">
								@else
									<input type="checkbox" name="club_house" value="9999">
								@endif
								Club house
							</label>
						</div>
						<div class="checkbox">
							<label>
								@if(in_array("elevator",$amenities))
									<input type="checkbox" name="elevatar" value="9999" checked="checked">
								@else
									<input type="checkbox" name="elevator" value="9999">
								@endif
								Elevator
							</label>
						</div>
						<div class="checkbox">
							<label>
								@if(in_array("laundry_room",$amenities))
									<input type="checkbox" name="laundry_room" value="9999" checked="checked">
								@else
									<input type="checkbox" name="laundry_room" value="9999">
								@endif
								Laundry room
							</label>
						</div>
						<div class="checkbox">
							<label>
								@if(in_array("pool",$amenities))
									<input type="checkbox" name="pool" value="9999" checked="checked">
								@else
									<input type="checkbox" name="pool" value="9999">
								@endif
								Pool
							</label>
						</div>
					</div>

					<div class="col-md-4">
						<div class="checkbox">
							<label>
								@if(in_array("tennis_court",$amenities))
									<input type="checkbox" name="tennis_court" value="9999" checked="checked">
								@else
									<input type="checkbox" name="tennis_court" value="9999">
								@endif
								Tennis court
							</label>
						</div>
						<div class="checkbox">
							<label>
								@if(in_array("door_attendant",$amenities))
									<input type="checkbox" name="door_attendant" value="9999" checked="checked">
								@else
									<input type="checkbox" name="door_attendant" value="9999">
								@endif
								Door attendant
							</label>
						</div>
						<div class="checkbox">
							<label>
								@if(in_array("fitness_center",$amenities))
									<input type="checkbox" name="fitness_center" value="9999" checked="checked">
								@else
									<input type="checkbox" name="fitness_center" value="9999">
								@endif
								Fitness center
							</label>
						</div>
						<div class="checkbox">
							<label>
								@if(in_array("offstreet_parking",$amenities))
									<input type="checkbox" name="offstreet_parking" value="9999" checked="checked">
								@else
									<input type="checkbox" name="offstreet_parking" value="9999">
								@endif
								Off-street parking
							</label>
						</div>
					</div>

					<div class="col-md-4">
						<div class="checkbox">
							<label>
								@if(in_array("storage_units",$amenities))
									<input type="checkbox" name="storage_units" value="9999" checked="checked">
								@else
									<input type="checkbox" name="storage_units" value="9999">
								@endif
								Storage units
							</label>
						</div>
						<div class="checkbox">
							<label>
								@if(in_array("wheelchair_access",$amenities))
									<input type="checkbox" name="wheelchair_access" value="9999" checked="checked">
								@else
									<input type="checkbox" name="wheelchair_access" value="9999">
								@endif
								Wheelchair access
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label>Description</label>
			<textarea class="form-control" name="description" id="description" rows="10">{{$prop->description}}</textarea>
			<p><small>This will be a WYSIWYG editor in production</small></p>
		</div>

		<div class="row">
			<div class="form-group">
				<label data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Property owner <span class="caret"></span> </label>
				<p><small>This will be angular in production</small></p>
			</div>
			<div class="collapse" id="collapseExample">
			<div class="form-group" >
				<label>Owner</label>
				<input type="text" name="owner_owner" value="{{$owner_info[0]}}" id="owner" class="form-control">
			</div>
			<div class="row">
				<div class="form-group">
					<div class="col-md-4">
						<label>Deposit</label>
						<input type="text" name="owner_deposit" value="{{$owner_info[1]}}" id="deposit" class="form-control">
					</div>
					<div class="col-md-4">
						<label>Management fee</label>
						<input type="text" name="owner_management_fee_percentage" value="{{$owner_info[2]}}" id="management-fee-percentage" class="form-control">
					</div>
					<div class="col-md-4">
						<label>Management fee</label>
						<input type="text" name="owner_management_fee_fixed" value="{{$owner_info[3]}}" id="management-fee-fixed" class="form-control">
					</div>
				</div>
			</div>
			</div>
		</div>

		<div class="row">
			<div class="form-group">
				<label>Unit information</label>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Unit #</label>
					<input type="text" name="unit_number" value="{{$unit_info[0]}}" id="unit" class="form-control" required>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Unit type</label>
					<input type="text" name="unit_type" value="{{$unit_info[1]}}" id="unit-type" class="form-control" required>
					<p><small>Will be a dropdown soon</small></p>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Sq ft</label>
					<input type="text" name="unit_square_footage" value="{{$unit_info[2]}}" id="square-footage" class="form-control">
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Beds</label>
					<input type="text" name="unit_beds" value="{{$unit_info[3]}}" id="beds" class="form-control">
					<p><small>Will be a dropdown soon</small></p>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Baths</label>
					<input type="text" name="unit_baths" value="{{$unit_info[4]}}" id="baths" class="form-control">
					<p><small>Will be a dropdown soon</small></p>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Rent $</label>
					<input type="text" name="unit_rent" value="{{$unit_info[5]}}" id="rent" class="form-control" required>
				</div>
			</div>
		</div>

	 	<div class="row">
	 		<p><small>Add more units here</small></p>
	 	</div>

	 	<div class="row">
	 		<div class="form-group">
	 			<label data-toggle="collapse" href="#collapseInsurance" aria-expanded="false" aria-controls="collapseInsurance">Insurance <span class="caret"></span></label>
	 		</div>

	 		<div class="collapse" id="collapseInsurance">
	 		<div class="row">
	 			<div class="col-md-6">
	 				<div class="form-group">
	 					<label>Insurance company name</label>
	 					<input type="text" name="insurance_name" value="{{$insurance_info[0]}}" id="insurance-name" class="form-control">
	 				</div>
	 			</div>
	 			<div class="col-md-6">
	 				<div class="form-group">
	 					<label>Insurance company website</label>
	 					<input type="text" name="insurance_website" value="{{$insurance_info[1]}}" id="insurance-website" class="form-control">
	 				</div>
	 			</div>
	 		</div>
	 		<div class="row">
	 			<div class="col-md-6">
	 				<div class="form-group">
	 					<label>Agent name</label>
	 					<input type="text" name="insurance_agent_name" value="{{$insurance_info[2]}}" id="agent-name" class="form-control">
	 				</div>
	 			</div>
	 			<div class="col-md-6">
	 				<div class="form-group">
	 					<label>Agent email</label>
	 					<input type="email" name="insurance_agent_email" value="{{$insurance_info[3]}}" id="agent-email" class="form-control">
	 				</div>
	 			</div>
	 		</div>
	 		<div class="row">
	 			<div class="col-md-4">
	 				<div class="form-group">
	 					<label>Agent phone</label>
	 					<input type="tel" name="insurance_agent_phone" value="{{$insurance_info[4]}}" id="agent-phone" class="form-control">
	 				</div>
	 			</div>
	 			<div class="col-md-4">
	 				<div class="form-group">
	 					<label>Policy #</label>
	 					<input type="text" name="insurance_policy" value="{{$insurance_info[5]}}" id="policy" class="form-control">
	 				</div>
	 			</div>
	 			<div class="col-md-4">
	 				<div class="form-group">
	 					<label>Price</label>
	 					<input type="text" name="insurance_price" value="{{$insurance_info[6]}}" id="price" class="form-control">
	 				</div>
	 			</div>
	 		</div>
	 		<div class="row">
	 			<div class="col-md-4">
	 				<div class="form-group">
	 					<label>Effective date</label>
	 					<input type="text" name="insurance_effective_date" value="{{$insurance_info[7]}}" id="effective-date" class="form-control">
	 				</div>
	 			</div>
	 			<div class="col-md-4">
	 				<div class="form-group">
	 					<label>Expiration date</label>
	 					<input type="text" name="insurance_expiration_date" value="{{$insurance_info[8]}}" id="expiration-date" class="form-control">
	 				</div>
	 			</div>
	 		</div>

 			<div class="form-group">
 				<label>Insurance details</label>
 				<textarea class="form-control" name="insurance_details" value="{{$insurance_info[9]}}" id="insurance-details" rows="10"></textarea>
 			</div>
 			</div>

 			<div class="form-group">
 				<p><small>Add email notification on expiration</small></p>
 			</div>

 			<input type="hidden" name="_token" value="{{ csrf_token() }}">
 			<input type="hidden" name="property_id" value="{{$prop->id}}">
		 	
		 	<div class="form-group">
		 		<button type="submit" class="btn btn-primary">Update</button>
		 	</div>
	 	</div>

	</form>
</div>
@endsection