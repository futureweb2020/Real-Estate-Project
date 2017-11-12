@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<form method="post" enctype="multipart/form-data">
			<div class="col-md-4">
				<div class="col-md-12">
					<div class="form-group">
						<p>Profile photo</p>
						<input type="file" name="profile_photo">
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<p>Documents</p>
						<input type="file" name="document">
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<h2>General information</h2>
				<div class="col-md-6">
					<div class="form-group">
						<label>First name</label>
						<input type="text" name="first_name" value="" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Last name</label>
						<input type="text" name="last_name" value="" class="form-control" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Company</label>
							<input type="text" name="company" value="" class="form-control">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Day of birth</label>
							<input type="date" name="dob" value="" claass="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Age</label>
							<input type="text" name="age" value="" class="form-control disabled">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Gender</label>
							<select name="gender" class="form-control">
								<option value="-1"></option>
								<option value="1">Male</option>
								<option value="2">Female</option>
								<option value="0">Other</option>
							</select>
							{{--App\Contact::gender_dropdown()--}}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Primary email</label>
							<input type="email" name="email" value="" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Phone</label>
							<input type="tel" name="phone" value="" class="form-control">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="form-group">
						<label>Private notes</label>
						<textarea name="notes" class="form-control" rows="10"></textarea>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection