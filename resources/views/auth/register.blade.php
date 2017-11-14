@extends('layouts.main')

@section('pagetitle')
Register
@endsection

@section('content')
<div class="col-md-4 col-md-offset-3">
	<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
		<header>
			<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
			<h2>Registration </h2>
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
				<form id="order-form" method="post" class="smart-form" novalidate="novalidate">
					<header>
						<!-- Choose how you will use Real Estate -->
					</header>

					<!-- <fieldset>
							<div class="col-md-12">
								<label class="select">
									<select name="type">
										<option value="0" selected="" disabled="">I am a ...</option>
										<option value="1">Landlord</option>
										<option value="2">Tenant</option>
									</select> 
									<i></i> 
								</label>
							</div>
					</fieldset> -->

					<fieldset>
						<div class="row">
							<section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="text" name="first_name" placeholder="First name">
								</label>
							</section>
							<section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="text" name="last_name" placeholder="Last name">
								</label>
							</section>
						</div>

						<div class="row">
							<section class="col col-md-12">
								<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
									<input type="email" name="email" placeholder="E-mail">
								</label>
								<i>This is used for notifications</i> 
							</section>
						</div>

						<div class="row">
							<section class="col col-md-12">
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="password" placeholder="********">
								</label>
								<i>Choose a secure password</i> 
							</section>
						</div>
					</fieldset>

					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<footer>
						<button type="submit" class="btn btn-primary">
							Register!
						</button>
					</footer>
				</form>
			</div>
			<!-- end widget content -->		
		</div>
		<!-- end widget div -->
	</div>
	<!-- end widget -->
</div>
@endsection

