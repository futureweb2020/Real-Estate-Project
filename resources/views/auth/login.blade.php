@extends('layouts.main')

@section('pagetitle')
Login
@endsection

@section('content')
<div class="col-md-4 col-md-offset-3">
	<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
		<header>
			<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
			<h2>Login </h2>				
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
				<form id="login-form" method="post" class="smart-form" novalidate="novalidate">
					<fieldset>
						<div class="row">
							<section class="col col-md-12">
								<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
									<input type="email" name="email" placeholder="E-mail">
								</label>
								<i></i> 
							</section>
						</div>

						<div class="row">
							<section class="col col-md-12">
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="password" placeholder="********">
								</label>
								<i></i> 
							</section>
						</div>
					</fieldset>

					<!-- <fieldset>
						<div class="row">
							<section class="col-md-6">
								<label class="checkbox">
									<input type="checkbox" name="remember"> Remember Me
								</label>
							</section>
						</div>
					</fieldset> -->

					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<footer>
						<button type="submit" class="btn btn-primary">
							Login!
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

