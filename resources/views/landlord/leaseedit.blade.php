@extends('layouts.main')

@section('content')
<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
		<h2>Update lease </h2>
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
			<div class="col-md-6 col-md-offset-1">
			<form id="lease-form" class="smart-form" method="post">
				<fieldset>
					<section>
						<div class="row">
							<div class="col col-4">
								<label class="label">Start date</label>
								<label class="input"> <i class="icon-prepend fa fa-calendar"></i>
									<input type="date" name="start" value="{{$lease->start}}" required>
								</label>
								<div class="note note-error">This is a required field.</div>
							</div>

							<div class="col col-4">
								<label class="label">End date</label>
								<label class="input"> <i class="icon-prepend fa fa-calendar"></i>
									<input type="date" name="end" value="{{$lease->end}}" required>
								</label>
								<div class="note note-error">This is a required field.</div>
							</div>
						</div>
						<div class="row">
							<div class="col col-4">
								<label class="label">Rent</label>
								<label class="input"> <i class="icon-prepend fa fa-usd"></i>
									<input type="text" name="rent" value="{{$lease->rent}}" required>
								</label>
								<div class="note note-error">This is a required field.</div>
							</div>

							<div class="col col-4">
								<label class="label">Deposit</label>
								<label class="input"> <i class="icon-prepend fa fa-usd"></i>
									<input type="text" name="deposit" value="{{$lease->deposit}}" required>
								</label>
								<div class="note note-error">This is a required field.</div>
							</div>
						</div>
						<div class="row">
							<div class="col col-4">
								<label class="label">Due day</label>
								<label class="select"> <i class="icon-append fa fa-sun-o"></i>
									<select name="day_due" required>
										@if($lease->day_due == '1st of the month')
											<option value="1st of the month" selected>1st of the month</option>
										@else
											<option value="1st of the month">1st of the month</option>
										@endif
										@if($lease->day_due == '2nd of the month')
											<option value="2nd of the month" selected>2nd of the month</option>
										@else
											<option value="2md of the month">2nd of the month</option>
										@endif
										@if($lease->day_due == '3rd of the month')
											<option value="3rd of the month" selected>3rd of the month</option>
										@else
											<option value="3rd of the month">3rd of the month</option>
										@endif
										@if($lease->day_due == '4th of the month')
											<option value="4th of the month" selected>4th of the month</option>
										@else
											<option value="4th of the month">4th of the month</option>
										@endif
										@if($lease->day_due == '5th of the month')
											<option value="5th of the month" selected>5th of the month</option>
										@else
											<option value="5th of the month">5th of the month</option>
										@endif
										@if($lease->day_due == '6th of the month')
											<option value="6th of the month" selected>6th of the month</option>
										@else
											<option value="6th of the month">6th of the month</option>
										@endif
										@if($lease->day_due == '7th of the month')
											<option value="7th of the month" selected>7th of the month</option>
										@else
											<option value="7th of the month">7th of the month</option>
										@endif
										@if($lease->day_due == '8th of the month')
											<option value="8th of the month" selected>8th of the month</option>
										@else
											<option value="8th of the month">8th of the month</option>
										@endif
										@if($lease->day_due == '9th of the month')
											<option value="9th of the month" selected>9th of the month</option>
										@else
											<option value="9th of the month">9th of the month</option>
										@endif
										@if($lease->day_due == '10th of the month')
											<option value="10th of the month" selected>10th of the month</option>
										@else
											<option value="10th of the month">10th of the month</option>
										@endif
										@if($lease->day_due == '11th of the month')
											<option value="11th of the month" selected>11th of the month</option>
										@else
											<option value="11th of the month">11th of the month</option>
										@endif
										@if($lease->day_due == '12th of the month')
											<option value="12th of the month" selected>12th of the month</option>
										@else
											<option value="12th of the month">12th of the month</option>
										@endif
										@if($lease->day_due == '13th of the month')
											<option value="13th of the month" selected>13th of the month</option>
										@else
											<option value="13th of the month">13th of the month</option>
										@endif
										@if($lease->day_due == '14th of the month')
											<option value="14th of the month" selected>14th of the month</option>
										@else
											<option value="14th of the month">14th of the month</option>
										@endif
										@if($lease->day_due == '15th of the month')
											<option value="15th of the month" selected>15th of the month</option>
										@else
											<option value="15th of the month">15th of the month</option>
										@endif
										@if($lease->day_due == '16th of the month')
											<option value="16th of the month" selected>16th of the month</option>
										@else
											<option value="16th of the month">16th of the month</option>
										@endif
										@if($lease->day_due == '17th of the month')
											<option value="17th of the month" selected>17th of the month</option>
										@else
											<option value="17th of the month">17th of the month</option>
										@endif
										@if($lease->day_due == '18th of the month')
											<option value="18th of the month" selected>18th of the month</option>
										@else
											<option value="18th of the month">18th of the month</option>
										@endif
										@if($lease->day_due == '19th of the month')
											<option value="19th of the month" selected>19th of the month</option>
										@else
											<option value="19th of the month">19th of the month</option>
										@endif
										@if($lease->day_due == '20th of the month')
											<option value="20th of the month" selected>20th of the month</option>
										@else
											<option value="20th of the month">20th of the month</option>
										@endif
										@if($lease->day_due == '21st of the month')
											<option value="21st of the month" selected>21st of the month</option>
										@else
											<option value="21st of the month">21st of the month</option>
										@endif
										@if($lease->day_due == '22nd of the month')
											<option value="22nd of the month" selected>22nd of the month</option>
										@else
											<option value="22nd of the month">22nd of the month</option>
										@endif
										@if($lease->day_due == '23rd of the month')
											<option value="23rd of the month" selected>23rd of the month</option>
										@else
											<option value="23rd of the month">23rd of the month</option>
										@endif
										@if($lease->day_due == '24th of the month')
											<option value="24th of the month" selected>24th of the month</option>
										@else
											<option value="24th of the month">24th of the month</option>
										@endif
										@if($lease->day_due == '25th of the month')
											<option value="25th of the month" selected>25th of the month</option>
										@else
											<option value="25th of the month">25th of the month</option>
										@endif
										@if($lease->day_due == '26th of the month')
											<option value="26th of the month" selected>26th of the month</option>
										@else
											<option value="26th of the month">26th of the month</option>
										@endif
										@if($lease->day_due == '27th of the month')
											<option value="27th of the month" selected>27th of the month</option>
										@else
											<option value="27th of the month">27th of the month</option>
										@endif
										@if($lease->day_due == '28th of the month')
											<option value="28th of the month" selected>28th of the month</option>
										@else
											<option value="28th of the month">28th of the month</option>
										@endif
										@if($lease->day_due == '29th of the month')
											<option value="29th of the month" selected>29th of the month</option>
										@else
											<option value="29th of the month">29th of the month</option>
										@endif
										@if($lease->day_due == '30th of the month')
											<option value="30th of the month" selected>30th of the month</option>
										@else
											<option value="30th of the month">30th of the month</option>
										@endif
										@if($lease->day_due == '31st of the month')
											<option value="31st of the month" selected>31st of the month</option>
										@else
											<option value="31st of the month">31st of the month</option>
										@endif
									</select>
								</label>
								<div class="note note-error">This is a required field.</div>
							</div>
						</div>
						<div class="row">
							
						</div>
					</section>

				</fieldset>

				<?php 
					if($lease->tenant != '')
					{
						$array = App\Lease::array_tenant($lease->tenant);
						$name = $array[0];
						$email = $array[1];
						$phone = $array[2];
						$emergency = $array[3];
					}
					else
					{
						$name = '';
						$email = '';
						$phone = '';
						$emergency = '';
					}
				?>

				<fieldset>
					<legend>Tenant info <small>(optional)</small></legend>
					<section>
						<div class="row">

							<div class="col col-4">
								<label class="label">Name</label>
								<label class="input"> <i class="icon-prepend fa fa-user"></i>
									<input type="text" name="tenant_name" value="{{$name}}">
								</label>
							</div>
							<div class="col col-4">
								<label class="label">Email</label>
								<label class="input"> <i class="icon-prepend fa fa-envelope"></i>
									<input type="email" name="tenant_email" value="{{$email}}">
								</label>
							</div>
						</div>
						<div class="row">

							<div class="col col-4">
								<label class="label">Phone</label>
								<label class="input"> <i class="icon-prepend fa fa-phone"></i>
									<input type="text" name="tenant_phone" value="{{$phone}}">
								</label>
							</div>
							<div class="col col-4">
								<label class="label">Emergency</label>
								<label class="input"> <i class="icon-prepend fa fa-phone"></i>
									<input type="text" name="tenant_emergency" value="{{$emergency}}">
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
						Update information
					</button>
				</footer>
			</form>
			</div>
		</div>
	</div>
</div>
@endsection

