@extends('layouts.main')

@section('pagetitle')
Property
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<a href="{{url('/')}}/landlord/property/add" class="btn btn-default">+ Add new property</a>
	</div>
</div>
<?php 
	if(!Auth::guest())
		$properties = App\Property::where('user_id','=',Auth::user()->id)->where('status','!=','deleted')->get();
	else
		$properties = null;
?>


	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false">
		<header>
			<span class="widget-icon"> <i class="fa fa-table"></i> </span>
			<h2>Properties </h2>
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
				<table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">

			        <thead>
			        	<tr>
							<th class="hasinput" style="width:27%">
								<input type="text" class="form-control" placeholder="Filter Name" />
							</th>
							<th class="hasinput" style="width:7%">
								<input type="text" class="form-control" placeholder="Filter Unit" />
							</th>
							<!-- <th class="hasinput" style="width:17%">
								<input type="text" class="form-control" placeholder="Filter Address" />
							</th> -->
							<!-- <th class="hasinput" style="width:7%">
								<input type="text" class="form-control" placeholder="Filter Units" />
							</th> -->
							<th class="hasinput" style="width:10%">
								<input type="text" class="form-control" placeholder="Filter Status" />
							</th>
							<th class="hasinput" style="width:17%">
								<input type="text" class="form-control" placeholder="Filter Tenant" />
							</th>
						</tr>
						<tr>
							<th data-class="expand">Address</th>
							<th>Unit #</th>
							<!-- <th data-hide="phone">Address</th> -->
							<!-- <th data-hide="phone">Units</th> -->
							<th>Status</th>
							<th data-hide="phone">Tenant</th>
							<!-- <th data-hide="phone">Lease</th> -->
							<th>Accounting</th>
							<th>Reports</th>
							<th>Maintenance</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>
						@if(!$properties)
							<td>No properties added</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						@else
							@foreach($properties as $prop)
							<?php $units = App\Unit::where('property_id','=',$prop->id)->where('status','!=','deleted')->get(); ?>
							@if($units)
								@foreach($units as $u)
								<tr>
									<td>{{$prop->name}}</td>
									<td><a href="{{url('/')}}/landlord/property/unit/edit/{{$u->id}}">{{$u->number}}</a></td>
									<!-- <td>{{$prop->street}}, {{$prop->city}}, {{$prop->state}}</td> -->
									<!-- <td>{{$prop->units}}</td> -->
									<td><span class="status">{{ucwords($u->status)}}</span> <span class="pull-right"><button href="#" class="status btn btn-xs btn-primary" data-status="{{$u->status}}" data-id="{{$u->id}}">Change</button></td>
									<td><a href="{{url('/')}}/landlord/property/lease/edit/{{$u->lease_id}}">{{App\Lease::parse_tenant($u->tenant)}}</a></td>
									@if($u->status == 'occupied')
										<!-- <td><a href="#">Lease</a></td> -->
									@else
										<!-- <td></td> -->
									@endif
									<td><a href="{{url('/')}}/landlord/property/accounting/{{$prop->id}}">View</a></td>
									<td><a href="{{url('/')}}/landlord/property/reports/{{$prop->id}}">View</a></td>
									<td><a href="{{url('/')}}/landlord/property/maintenance/{{$prop->id}}">View</a></td>
									<td><a href="{{url('/')}}/landlord/property/remove/unit/{{$u->id}}" class="remove"><span class="fa fa-times .removee"></span></a></td>
								</tr>
								@endforeach
							@endif
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div style="display:none;">
		<form id="status-form" method="post" action="{{url('/')}}/landlord/property/status">
			<input type="hidden" id="status-status" name="status" value="occupied">
			<input type="hidden" id="status-id" name="id" value="">
			<input type="hidden" id="submit" name="_token" value="{{ csrf_token() }}">
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection

@section('modal')
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Create Lease
				</h4>
			</div>
			<div class="modal-body no-padding">
				<form id="lease-form" class="smart-form" method="post">
					<fieldset>
						<section>
							<div class="row">
								<label class="label col col-2"></label>
								<div class="col col-10">
									<label class="label">Start date</label>
									<label class="input"> <i class="icon-prepend fa fa-calendar"></i>
										<input type="date" name="start" required>
									</label>
									<div class="note note-error">This is a required field.</div>
								</div>

								<label class="label col col-2"></label>
								<div class="col col-10">
									<label class="label">End date</label>
									<label class="input"> <i class="icon-prepend fa fa-calendar"></i>
										<input type="date" name="end" required>
									</label>
									<div class="note note-error">This is a required field.</div>
								</div>
							</div>
							<div class="row">
								<label class="label col col-2"></label>
								<div class="col col-10">
									<label class="label">Rent</label>
									<label class="input"> <i class="icon-prepend fa fa-usd"></i>
										<input type="text" name="rent" required>
									</label>
									<div class="note note-error">This is a required field.</div>
								</div>
								<label class="label col col-2"></label>
								<div class="col col-10">
									<label class="label">Deposit</label>
									<label class="input"> <i class="icon-prepend fa fa-usd"></i>
										<input type="text" name="deposit" required>
									</label>
									<div class="note note-error">This is a required field.</div>
								</div>
								<label class="label col col-2"></label>
								<div class="col col-10">
									<label class="label">Due day</label>
									<label class="select"> <i class="icon-append fa fa-sun-o"></i>
										<select name="day_due" required>
											<option value="1st of the month">1st of the month</option>
											<option value="2nd of the month">2nd of the month</option>
											<option value="3rd of the month">3rd of the month</option>
											<option value="4th of the month">4th of the month</option>
											<option value="5th of the month">5th of the month</option>
											<option value="6th of the month">6th of the month</option>
											<option value="7th of the month">7th of the month</option>
											<option value="8th of the month">8th of the month</option>
											<option value="9th of the month">9th of the month</option>
											<option value="10th of the month">10th of the month</option>
											<option value="11th of the month">11th of the month</option>
											<option value="12th of the month">12th of the month</option>
											<option value="13th of the month">13th of the month</option>
											<option value="14th of the month">14th of the month</option>
											<option value="15th of the month">15th of the month</option>
											<option value="16th of the month">16th of the month</option>
											<option value="17th of the month">17th of the month</option>
											<option value="18th of the month">18th of the month</option>
											<option value="19th of the month">19th of the month</option>
											<option value="20th of the month">20th of the month</option>
											<option value="21rst of the month">21st of the month</option>
											<option value="22nd of the month">22nd of the month</option>
											<option value="23rd of the month">23rd of the month</option>
											<option value="24th of the month">24th of the month</option>
											<option value="25th of the month">25th of the month</option>
											<option value="26th of the month">26th of the month</option>
											<option value="27th of the month">27th of the month</option>
											<option value="28th of the month">28th of the month</option>
											<option value="29th of the month">29th of the month</option>
											<option value="30th of the month">30th of the month</option>
											<option value="31st of the month">31st of the month</option>
										</select>
									</label>
									<div class="note note-error">This is a required field.</div>
								</div>
							</div>
							<div class="row">
								
							</div>
						</section>

					</fieldset>

					<fieldset>
						<legend>Tenant info <small>(optional)</small></legend>
						<section>
							<div class="row">
								<label class="label col col-2"></label>
								<div class="col col-4">
									<label class="label">Name</label>
									<label class="input"> <i class="icon-prepend fa fa-user"></i>
										<input type="text" name="tenant_name">
									</label>
								</div>
								<div class="col col-4">
									<label class="label">Email</label>
									<label class="input"> <i class="icon-prepend fa fa-envelope"></i>
										<input type="email" name="tenant_email">
									</label>
								</div>
							</div>
							<div class="row">
								<label class="label col col-2"></label>
								<div class="col col-4">
									<label class="label">Phone</label>
									<label class="input"> <i class="icon-prepend fa fa-phone"></i>
										<input type="text" name="tenant_phone">
									</label>
								</div>
								<div class="col col-4">
									<label class="label">Emergency</label>
									<label class="input"> <i class="icon-prepend fa fa-phone"></i>
										<input type="text" name="tenant_emergency">
									</label>
								</div>
							</div>
						</section>
					</fieldset>

					<input type="hidden" id="submit" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" id="id" value="">
					<input type="hidden" name="status" id="status" value="">

					<footer>
						<button type="submit" class="btn btn-primary">
							Create lease
						</button>
					</footer>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{url('/')}}/js/app.config.js"></script>
<script src="{{url('/')}}/js/app.min.js"></script>
<script src="{{url('/')}}/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/js/plugin/datatables/dataTables.colVis.min.js"></script>
<script src="{{url('/')}}/js/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="{{url('/')}}/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="{{url('/')}}/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
<script src="{{url('/')}}/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="{{url('/')}}/js/notification/SmartNotification.min.js"></script>

<script>
$(function() {
	$(".remove").on("click",function(e) {
		console.log(this);
		var href = $(this).attr('href');
		e.preventDefault();
		$.SmartMessageBox({
			title : "Remove Unit!",
			content : "You are sure you want to remove this unit ?",
			buttons : '[No][Yes]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Yes") {
				$.smallBox({
					title : "Proprety Action",
					content : "<i class='fa fa-home'></i> <i>Unit has been removed from the property... <br><strong>The page will reload</strong></i>",
					color : "#659265",
					iconSmall : "fa fa-check fa-2x fadeInRight animated",
					timeout : 4000
				});
				setTimeout(function() {
					window.location.href = href;
				}, 3000);
			}

			if (ButtonPressed === "No") {
				$.smallBox({
					title : "Proeprty Action",
					content : "<i class='fa fa-clock-o'></i> <i>Unit has not been removed from the property...</i>",
					color : "#C46A69",
					iconSmall : "fa fa-times fa-2x fadeInRight animated",
					timeout : 4000
				});
			}
		});
	});
});
</script>

<script>
$(function() {
	var submit = true;
	$("form#lease-form").on('submit',function(e) {
		$("form").find('input').each(function() {
			if($(this).prop('required'))
			{
				if($(this).value == '')
				{
					$(this).addClass("error-state");
					submit = false;
				}
				else
				{
					$(this).removeClass("error-state");
				}
			}
		});

		if(submit == false)
		{
			e.preventDefault();
		}
	});
});
</script>

<script>
$(function() {
	$(".status").on('click',null,function(e) {
		var id = $(this).data('id');
		var s = $(this).data('status');
		if(s == 'vacant')
		{
			document.getElementById("id").value = id;
			document.getElementById("status").value = s;
			$('#myModal').modal('show');
		}
		else
		{
			document.getElementById("status-id").value = id;

			$.SmartMessageBox({
				title : "Remove Tenant!",
				content : "Are sure you want to do this ?  Continuing will remove the current tenant and put the unit into a vacant status.",
				buttons : '[No][Yes]'
			}, function(ButtonPressed) {
				if (ButtonPressed === "Yes") {
					$.smallBox({
						title : "Unit Action",
						content : "<i class='fa fa-home'></i> <i>Unit status has been changed...</i>",
						color : "#659265",
						iconSmall : "fa fa-check fa-2x fadeInRight animated",
						timeout : 4000
					});
					$.ajax({
						url: 'http://www.metumtam.com/landlord/property/status',
						type: 'post',
						cache: false,
						data: {status: s, id: id},
						success: function(res) {
							location.reload();
						},
						error: function(res) {
							console.log(res.responseText);
							location.reload();
						}
					});
				}

				if (ButtonPressed === "No") {
					$.smallBox({
						title : "Unit Action",
						content : "<i class='fa fa-clock-o'></i> <i>Unit status has not been changed...</i>",
						color : "#C46A69",
						iconSmall : "fa fa-times fa-2x fadeInRight animated",
						timeout : 4000
					});
				}
			});
		}
	});
});
</script>


<script>
$(document).ready(function() {		
	pageSetUp();
	
	/* // DOM Position key index //

	l - Length changing (dropdown)
	f - Filtering input (search)
	t - The Table! (datatable)
	i - Information (records)
	p - Pagination (paging)
	r - pRocessing 
	< and > - div elements
	<"#id" and > - div with an id
	<"class" and > - div with a class
	<"#id.class" and > - div with an id and class
	
	Also see: http://legacy.datatables.net/usage/features
	*/	

	/* BASIC ;*/
	var responsiveHelper_dt_basic = undefined;
	var responsiveHelper_datatable_fixed_column = undefined;
	var responsiveHelper_datatable_col_reorder = undefined;
	var responsiveHelper_datatable_tabletools = undefined;
	
	var breakpointDefinition = {
		tablet : 1024,
		phone : 480
	};

	$('#dt_basic').dataTable({
		"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
			"t"+
			"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
		"autoWidth" : true,
        "oLanguage": {
		    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
		},
		"preDrawCallback" : function() {
			// Initialize the responsive datatables helper once.
			if (!responsiveHelper_dt_basic) {
				responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
			}
		},
		"rowCallback" : function(nRow) {
			responsiveHelper_dt_basic.createExpandIcon(nRow);
		},
		"drawCallback" : function(oSettings) {
			responsiveHelper_dt_basic.respond();
		}
	});

    var otable = $('#datatable_fixed_column').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 0 }
        ],
        "order": [[ 1, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(0, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="7">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
 
    // Order by the grouping
    $('#datatable_fixed_column tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 1 && currentOrder[1] === 'asc' ) {
            table.order( [ 1, 'desc' ] ).draw();
        }
        else {
            table.order( [ 1, 'asc' ] ).draw();
        }
    } );

	// custom toolbar
	// $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
		   
	// Apply the filter
	$("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
		
	    otable
	        .column( $(this).parent().index()+':visible' )
	        .search( this.value )
	        .draw();
	        
	});
});
</script>
@endsection