@extends('layouts.main')

<?php 
	if(!Auth::guest())
	{
		$leases_active = App\Lease::where('landlord_id','=',Auth::user()->id)->where('status','=','active')->get();
		$leases_terminated = App\Lease::where('landlord_id','=',Auth::user()->id)->where('status','=','terminated')->get();
		$leases_deleted = App\Lease::where('landlord_id','=',Auth::user()->id)->where('status','=','deleted')->get();
	}
	else
	{
		
	}
?>

@section('content')
<div class="jarviswidget col-md-6 col-md-offset-3" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
		<h2>Leases </h2>
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
			<ul id="lease-tabs" class="nav nav-tabs bordered">
				<li><a href="#active" class="active" data-toggle="tab">Active</a></li>
				<li><a href="#terminated" data-toggle="tab">Terminated</a></li>
				<li><a href="#deleted" data-toggle="tab">Deleted</a></li>
			</ul>

			<div id="lease-tab-content" class="tab-content padding-10">
				<div class="tab-pane fade in active" id="active">
					@if($leases_active)
						@foreach($leases_active as $lease)
							<?php 
								$unit = App\Unit::find($lease->unit_id); 
								$property = App\Property::find($lease->property_id); 
							?>
							<div class="row">
								<div class="col-md-6">
									@if($property->type == 'apartment' || $property->type == 'condo')
										<p><strong>{{$property->name}}</strong></p>
										<p><strong>Unit:</strong> {{$unit->number}}</p>
									@else
										<p><strong>{{$property->name}}</strong></p>
									@endif
								</div>
								<div class="col-md-6">
									<p><strong>Term:</strong> {{App\Utilities::fix_date($lease->start)}} - {{App\Utilities::fix_date($lease->end)}}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p><strong>Currenct balance due:</strong></p>
									<p>{{App\Lease::due_amount($lease)}}</p>
								</div>
								<div class="col-md-6">
									<p><strong>Tenant:</strong> {{App\Lease::parse_tenant($lease->tenant)}}</p>
									<p><strong>Phone:</strong> {{App\Lease::parse_phone($lease->tenant)}}</p>
									<p><strong>Email:</strong> {{App\Lease::parse_email($lease->tenant)}}</p>
									<p><strong>Rent:</strong> {{$lease->rent}}</p>
								</div>
							</div>
							
								<button type="button" class="btn btn-primary">Invoice</button>
							
						@endforeach
					@endif
				</div>

				<div class="tab-pane fade in" id="terminated">
					<table id="datatable_fixed_column_1" class="table table-striped table-bordered" width="100%">
				        <thead>
				        	<tr>
								<th class="hasinput" style="width:27%">
									<input type="text" class="form-control" placeholder="Filter Name" />
								</th>
								<th class="hasinput" style="width:7%">
									<input type="text" class="form-control" placeholder="Filter Unit" />
								</th>
								<th class="hasinput" style="width:17%">
									<input type="text" class="form-control" placeholder="Filter Tenant" />
								</th>
							</tr>
							<tr>
								<th data-class="expand">Address</th>
								<th>Unit #</th>
								<th>Tenant</th>
							</tr>
						</thead>
						<tbody>
							@if($leases_terminated)
								@foreach($leases_terminated as $lease)
									<?php $unit = App\Unit::find($lease->unit_id); ?>
									@if($unit)
										<tr>
											<td>{{$unit->address}}</td>
											<td><a href="#" class="ended" data-toggle="modal" data-target="#endedLease" data-id="{{$lease->id}}">{{$unit->number}}</a></td>
											<td><a href="#" class="ended" data-toggle="modal" data-target="#endedLease" data-id="{{$lease->id}}">{{App\Lease::parse_tenant($lease->tenant)}}</a></td>
										</tr>
									@endif
								@endforeach
							@else
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>

				<div class="tab-pane fade in" id="deleted">
					<table id="datatable_fixed_column_2" class="table table-striped table-bordered" width="100%">
				        <thead>
				        	<tr>
								<th class="hasinput" style="width:27%">
									<input type="text" class="form-control" placeholder="Filter Name" />
								</th>
								<th class="hasinput" style="width:7%">
									<input type="text" class="form-control" placeholder="Filter Unit" />
								</th>
								<th class="hasinput" style="width:17%">
									<input type="text" class="form-control" placeholder="Filter Tenant" />
								</th>
							</tr>
							<tr>
								<th data-class="expand">Address</th>
								<th>Unit #</th>
								<th>Tenant</th>
							</tr>
						</thead>
						<tbody>
							@if($leases_deleted)
								@foreach($leases_deleted as $lease)
									<?php $unit = App\Unit::find($lease->unit_id); ?>
									@if($unit)
										<tr>
											<td>{{$unit->address}}</td>
											<td><a href="#" class="ended" data-toggle="modal" data-target="#endedLease" data-id="{{$lease->id}}">{{$unit->number}}</a></td>
											<td><a href="#" class="ended" data-toggle="modal" data-target="#endedLease" data-id="{{$lease->id}}">{{App\Lease::parse_tenant($lease->tenant)}}</a></td>
										</tr>
									@endif
								@endforeach
							@else
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="endedLease" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Lease information
				</h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<p><strong id="ended-address"></strong></p>
						<p id="ended-unit"></p>
					</div>
					<div class="col-md-6">
						<p><strong>Term:</strong> <span id="ended-start"></span> - <span id="ended-end"></span></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p><strong>Tenant:</strong> <span id="ended-tenant"></span></p>
						<p><strong>Phone:</strong> <span id="ended-phone"></span></p>
						<p><strong>Email:</strong> <span id="ended-email"></span></p>
					</div>
					<div class="col-md-6">
						<p><strong>Rent:</strong> <span id="ended-rent"></span></p>
					</div>
				</div>
			</div>

			<div class="modal-footer">
        		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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

<script>
$(function() {
	$(".ended").on("click",function(e) {
		var id = $(this).data("id");

		var pathArray = window.location.href.split( '/' );
		protocol = pathArray[0];
		host = pathArray[2];
		url = protocol + '//' + host + '/landlord/lease/info/'+id;

		document.getElementById("ended-address").innerHTML = '';
		document.getElementById("ended-unit").innerHTML = '';
		document.getElementById('ended-start').innerHTML = '';
		document.getElementById('ended-end').innerHTML = '';
		document.getElementById('ended-tenant').innerHTML = '';
		document.getElementById('ended-phone').innerHTML = '';
		document.getElementById('ended-email').innerHTML = '';
		document.getElementById('ended-rent').innerHTML = '';

		$.ajax({
			url: url,
			type: 'get',
			cache: false,
			success: function(res) {
				document.getElementById("ended-address").innerHTML = res.address;
				document.getElementById("ended-unit").innerHTML = res.unit;
				var start = new Date(res.start);
				var end = new Date(res.end);
				document.getElementById('ended-start').innerHTML = start.toLocaleDateString("en-US");
				document.getElementById('ended-end').innerHTML = end.toLocaleDateString("en-US");
				document.getElementById('ended-tenant').innerHTML = res.tenant;
				document.getElementById('ended-phone').innerHTML = res.phone;
				document.getElementById('ended-email').innerHTML = res.email;
				document.getElementById('ended-rent').innerHTML = res.rent;

				$("#endedLease").modal("show");
			},
			error: function(res) {
				$('#endedLease').modal("hide");
			}
		})
	});
});
</script>

<script>
$(function() {
	pageSetUp();

	var responsiveHelper_dt_basic = undefined;
	var responsiveHelper_datatable_fixed_column = undefined;
	var responsiveHelper_datatable_col_reorder = undefined;
	var responsiveHelper_datatable_tabletools = undefined;
	
	var breakpointDefinition = {
		tablet : 1024,
		phone : 480
	};

	var otable = $('#datatable_fixed_column_1, #datatable_fixed_column_2').DataTable({
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

    $('#datatable_fixed_column_1 tbody, #datatable_fixed_column_2 tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 1 && currentOrder[1] === 'asc' ) {
            table.order( [ 1, 'desc' ] ).draw();
        }
        else {
            table.order( [ 1, 'asc' ] ).draw();
        }
    } );

    $("#datatable_fixed_column_1 thead th input[type=text], #datatable_fixed_column_2 thead th input[type=text]").on( 'keyup change', function () {
		
	    otable
	        .column( $(this).parent().index()+':visible' )
	        .search( this.value )
	        .draw();
	        
	});
});
</script>
@endsection
