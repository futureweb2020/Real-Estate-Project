@extends('layouts.main')

@section('pagetitle')
Property
@endsection

@section('pagesubtitle')
 > Add new
@endsection

@section('content')
<div class="">
	<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
		<header>
			<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
			<h2>Add New Property </h2>
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
				<form method="post" name="add" class="smart-form" novalidate="novalidate">
					<header>
						Property information
					</header>
					<div class="col-md-4">
						<fieldset>
						<div id="map-canvas" style="width:200px;height:200px;"></div>
						<!-- <div id="image-canvas" style="width:200px;height:200px;"></div> -->
						</fieldset>
					</div>
					<div class="col-md-8">
						<fieldset>
							<div class="row">
								<section class="col col-8">
									<label class="input"> <i class="icon-prepend fa fa-home"></i>
										<input type="text" id="a" name="a" placeholder="123 Y St, Lincoln, NE 68403">
										<input type="hidden" name="lat" id="lat" value="">
										<input type="hidden" name="lng" id="lng" value="">
										<input type="hidden" name="locality" value="">
										<input type="hidden" name="administrative_area_level_1" value="">
										<input type="hidden" name="postal_code" value="">
										<input type="hidden" name="country" value="">
										<input type="hidden" name="formatted_address" value="">
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col col-5">
									<label class="select"> <i class="icond-prepend fa fa-home"></i>
										<select name="type" id="type">
											<option value="-1">Property type</option>
											<option value="house">House</option>
											<option value="apartment">Apartment</option>
											<option value="condo">Condo</option>
										</select>
									</label>
								</section>
							</div>

							<div class="row" id="unitinfo" style="display:none;">
								<section class="col col-md-2">
									<label class="label">Unit #</label>
									<label class="input"> <i></i>
										<input type="text" name="unit_number" value="" placeholder="Unit #">
									</label>
								</section>
								<section class="col col-md-2">
									<label class="label">Square footage</label>
									<label class="input">
										<input type="text" name="unit_footage" value="" placeholder="Sq Ft">
									</label>
								</section>
								<section class="col col-md-2">
									<label class="label">Beds</label>
									<label class="select"> <i class="icond-prepend fa fa-home"></i>
										<select name="unit_beds">
											<option value="1">1</option>
											<option value="1.2">1.5</option>
											<option value="2">2</option>
											<option value="2.5">2.5</option>
											<option value="3">3</option>
											<option value="3.5">3.5</option>
											<option value="4">4</option>
											<option value="4.5">4.5</option>
											<option value="5">5</option>
											<option value="5.5">5.5</option>
											<option value="6">6</option>
											<option value="6.5">6.5</option>
											<option value="7">7</option>
											<option value="7.5">7.5</option>
											<option value="8">8</option>
											<option value="8.5">8.5</option>
											<option value="9">9</option>
											<option value="9.5">9.5</option>
											<option value="10">10</option>
											<option value="10.5">10.5</option>
										</select>
									</label>
								</section>
								<section class="col col-md-2">
									<label class="label">Baths</label>
									<label class="select"> <i class="icond-prepend fa fa-home"></i>
										<select name="unit_baths">
											<option value="1">1</option>
											<option value="1.2">1.5</option>
											<option value="2">2</option>
											<option value="2.5">2.5</option>
											<option value="3">3</option>
											<option value="3.5">3.5</option>
											<option value="4">4</option>
											<option value="4.5">4.5</option>
											<option value="5">5</option>
											<option value="5.5">5.5</option>
											<option value="6">6</option>
											<option value="6.5">6.5</option>
											<option value="7">7</option>
											<option value="7.5">7.5</option>
											<option value="8">8</option>
											<option value="8.5">8.5</option>
											<option value="9">9</option>
											<option value="9.5">9.5</option>
											<option value="10">10</option>
											<option value="10.5">10.5</option>
										</select>
									</label>
								</section>
								<section class="col col-md-2">
									<label class="label">Rent</label>
									<label class="input">
										<input type="text" name="unit_rent" value="" placeholder="$ Rent">
									</label>
								</section>
							</div>

							<div id="addmoreunits">
								
							</div>

							<div class="row" id="houseinfo" style="display:none;">
								<input type="hidden" name="house_number" value="1" placeholder="Unit #">
								
								<section class="col col-md-2">
									<label class="label">Square footage</label>
									<label class="input">
										<input type="text" name="house_footage" value="" placeholder="Sq Ft">
									</label>
								</section>
								<section class="col col-md-2">
									<label class="label">Beds</label>
									<label class="select"> <i class="icond-prepend fa fa-home"></i>
										<select name="house_beds">
											<option value="1">1</option>
											<option value="1.2">1.5</option>
											<option value="2">2</option>
											<option value="2.5">2.5</option>
											<option value="3">3</option>
											<option value="3.5">3.5</option>
											<option value="4">4</option>
											<option value="4.5">4.5</option>
											<option value="5">5</option>
											<option value="5.5">5.5</option>
											<option value="6">6</option>
											<option value="6.5">6.5</option>
											<option value="7">7</option>
											<option value="7.5">7.5</option>
											<option value="8">8</option>
											<option value="8.5">8.5</option>
											<option value="9">9</option>
											<option value="9.5">9.5</option>
											<option value="10">10</option>
											<option value="10.5">10.5</option>
										</select>
									</label>
								</section>
								<section class="col col-md-2">
									<label class="label">Baths</label>
									<label class="select"> <i class="icond-prepend fa fa-home"></i>
										<select name="house_baths">
											<option value="1">1</option>
											<option value="1.2">1.5</option>
											<option value="2">2</option>
											<option value="2.5">2.5</option>
											<option value="3">3</option>
											<option value="3.5">3.5</option>
											<option value="4">4</option>
											<option value="4.5">4.5</option>
											<option value="5">5</option>
											<option value="5.5">5.5</option>
											<option value="6">6</option>
											<option value="6.5">6.5</option>
											<option value="7">7</option>
											<option value="7.5">7.5</option>
											<option value="8">8</option>
											<option value="8.5">8.5</option>
											<option value="9">9</option>
											<option value="9.5">9.5</option>
											<option value="10">10</option>
											<option value="10.5">10.5</option>
										</select>
									</label>
								</section>
								<section class="col col-md-2">
									<label class="label">Rent</label>
									<label class="input">
										<input type="text" name="house_rent" value="" placeholder="$ Rent">
									</label>
								</section>
							</div>
						</fieldset>
						<fieldset>
							<a class="btn btn-primary" style="display:none;" id="add" class="add" href="javascript:void(0);"><i class="fa fa-plus"></i> Add unit</a>
						</fieldset>
					</div>


					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="googlemap" id="googlemap" value="">

					<footer>
						<button type="submit" data-count="1" id="submit" class="btn btn-primary">
							Add Property
						</button>
					</footer>
				</form>
			</label>
		</section>
	</div>
</fieldset>
@endsection

@section('script')
<script src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyD3eMzXEuxMVzlzpnb6ldaNb9KYJtC2aOs"></script>

<script src="{{url('/')}}/js/jquery.geocomplete.min.js"></script>

<script>
$(function() {
	$("#add").on("click",function(e) {
		var count = $("#submit").data("count");
		var html = '';
		html += '<div class="row" id="add_'+count+'">';
		html += '<section class="col col-md-2">';
		html += '<label class="input">';
		html += '<input type="text" name="unit_number_'+count+'" value="" placeholder="Unit #">';
		html += '</label>';
		html += '</section>';
		html += '<section class="col col-md-2">';
		html += '<label class="input">';
		html += '<input type="text" name="unit_footage_'+count+'" value="" placeholder="Sq Ft">';
		html += '</label>';
		html += '</section>';
		html += '<section class="col col-md-2">';
		html += '<label class="select"> <i class="icond-prepend fa fa-home"></i>';
		html += '<select name="unit_beds_'+count+'">';
		html += '<option value="1">1</option>';
		html += '<option value="1.2">1.5</option>';
		html += '<option value="2">2</option>';
		html += '<option value="2.5">2.5</option>';
		html += '<option value="3">3</option>';
		html += '<option value="3.5">3.5</option>';
		html += '<option value="4">4</option>';
		html += '<option value="4.5">4.5</option>';
		html += '<option value="5">5</option>';
		html += '<option value="5.5">5.5</option>';
		html += '<option value="6">6</option>';
		html += '<option value="6.5">6.5</option>';
		html += '<option value="7">7</option>';
		html += '<option value="7.5">7.5</option>';
		html += '<option value="8">8</option>';
		html += '<option value="8.5">8.5</option>';
		html += '<option value="9">9</option>';
		html += '<option value="9.5">9.5</option>';
		html += '<option value="10">10</option>';
		html += '<option value="10.5">10.5</option>';
		html += '</select>';
		html += '</label>';
		html += '</section>';
		html += '<section class="col col-md-2">';
		html += '<label class="select"> <i class="icond-prepend fa fa-home"></i>';
		html += '<select name="unit_baths_'+count+'">';
		html += '<option value="1">1</option>';
		html += '<option value="1.2">1.5</option>';
		html += '<option value="2">2</option>';
		html += '<option value="2.5">2.5</option>';
		html += '<option value="3">3</option>';
		html += '<option value="3.5">3.5</option>';
		html += '<option value="4">4</option>';
		html += '<option value="4.5">4.5</option>';
		html += '<option value="5">5</option>';
		html += '<option value="5.5">5.5</option>';
		html += '<option value="6">6</option>';
		html += '<option value="6.5">6.5</option>';
		html += '<option value="7">7</option>';
		html += '<option value="7.5">7.5</option>';
		html += '<option value="8">8</option>';
		html += '<option value="8.5">8.5</option>';
		html += '<option value="9">9</option>';
		html += '<option value="9.5">9.5</option>';
		html += '<option value="10">10</option>';
		html += '<option value="10.5">10.5</option>';
		html += '</select>';
		html += '</label>';
		html += '</section>';
		html += '<section class="col col-md-2">';
		html += '<label class="input">';
		html += '<input type="text" name="unit_rent_'+count+'" value="" placeholder="$ Rent">';
		html += '</label>';
		html += '</section>';
		html += '</div>';

		$("#addmoreunits").append(html);
		document.getElementById('addmoreunits').style.display = '';
		count = count + 1;
		$("#submit").data("count",count);
	});
});

$(function() {
	$("#type").on("change",null,function(e) {
		var e = document.getElementById("type");
		var sel = e.options[e.selectedIndex].value;

		if(sel == 'apartment' || sel == 'condo')
		{
			var el = document.getElementById("unitinfo");
			el.style.display = "";
			document.getElementById('add').style.display = '';
			document.getElementById('houseinfo').style.display = 'none';
		}
		else
		{
			var el = document.getElementById("unitinfo");
			$("#addmoreunits").empty();
			el.style.display = "none";
			document.getElementById('add').style.display = 'none';
			document.getElementById('houseinfo').style.display = '';
		}
	});
});

$(function() {
	// https://maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&zoom=13&size=600x300&maptype=roadmap
	// &markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:green%7Clabel:G%7C40.711614,-74.012318
	// &markers=color:red%7Clabel:C%7C40.718217,-73.998284
	// &key=YOUR_API_KEY

	// https://maps.googleapis.com/maps/api/streetview?size=600x300&location=46.414382,10.013988&heading=151.78&pitch=-0.76&key=YOUR_API_KEY

	$("input#a").geocomplete({
		details: "form"
	})
	.bind("geocode:result",function(event,result) {
		var address = document.add.elements['formatted_address'].value;
		var lat = document.add.elements['lat'].value;
		var lng = document.add.elements['lng'].value;
		var url = encodeURI('https://maps.googleapis.com/maps/api/staticmap?center='+address+'&zoom=15&size=300x200&maptype=roadmap&markers=color:red|label:A|'+lat+','+lng+'&key=AIzaSyB6-PoLRYb2LjLmaWyofwruXSN3Ifmgm3Y');

		//var streetview = encodeURI('https://maps.googleapis.com/maps/api/streetview?size=300x200&location='+lat+','+lng+'&key=AIzaSyCXLPUa1vGUu_s5SHBd2-HQJrD59W2gCbc');

		document.getElementById("map-canvas").innerHTML = '<img src="'+url+'" alt="Property Map" style="min-width:100%;">';
		document.add.elements['googlemap'].value = url;
		//document.getElementById("image-canvas").innerHTML = '<img src="'+streetview+'" alt="Street View Map" style="min-width:100%;">';
	});

	$("input#a").on("change",function(event) {
		var mapdiv = document.getElementById("map-canvas");
		var stdiv = document.getElementById('image-canvas');
		if(mapdiv.innerHTML !== '')
		{
			mapdiv.innerHTML = '';
			stdiv.innerHTML = '';
			document.add.elemetns['googlemap'].value = '';
		}
	});
});
</script>


@endsection