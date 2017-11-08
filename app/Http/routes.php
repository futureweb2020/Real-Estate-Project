<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/************************************
 R E G I S T R A T I O N
*************************************/

Route::get('register',function() {
	return view('auth.register');
});

Route::post('register',function() {
	$res = App\User::do_register(Input::all());
	if(!is_array($res)) return 'Invalid response from server.';
	if($res['status'] == 'done') return redirect('login');
	else return redirect('register')->with('error',$res['message'])->withInput();
});


/************************************
 L O G I N
*************************************/
Route::get('login',function() {
	return view('auth.login');
});

Route::post('login',function() {
	$res = App\User::do_login(Input::all());
	if(!is_array($res)) return 'Invalid response from server.';
	if($res['status'] == 'done')
	{
		if(Auth::user()->type = 1) return redirect('landlord/dashboard');
		else return redirect('tenant/dashboard');
	}
	else return redirect('login')->with('error',$res['message']);
});

Route::get('logout',function() {
	$res = App\User::do_logout();
});

/************************************
 L A N D L O R D
 ************************************/
Route::get('landlord/dashboard', ['middleware' => 'auth', function() {
	return view('dashboards.landlord');
}]);

// property
Route::get('landlord/property',['middleware' => 'auth', function() {
	return view('landlord.propertyhome');
}]);

Route::get('landlord/property/add', ['middleware' => 'auth', function() {
	return view('landlord.propertyadd');
}]);

Route::post('landlord/property/add', ['middleware' => 'auth', function() {
	$res = App\Property::do_add(Input::all());
	if(!is_array($res)) return 'Invalid response from server.';
	if($res['status'] == 'done') return redirect('landlord/property')->with('success','New property added.');
	else return redirect('landlord/property/add')->with('error',$res['message'])->withInput();
}]);

Route::get('landlord/property/edit/{id}', ['middleware' => 'auth', function($id) {
	$id = intval($id);
	$property = App\Property::find($id);
	if($property)
		return view('landlord.propertyedit')->with('prop',$property);
	else
		return redirect('landlord/property')->with('error','Property not found');
}]);

Route::post('landlord/property/edit/{id}', ['middleware' => 'auth', function($id) {
	$res = App\Property::do_update(Input::all());
	if(!is_array($res)) return 'Invalid response from server.';
	if($res['status'] == 'done') return redirect('landlord/property')->with('success','Property updated.');
	else return redirect('landlord/property/edit/'.$id)->with('error',$res)->withInput();
}]);

// Leases
Route::get('landlord/leases', ['middleware' => 'auth', function() {
	return view('landlord.leases');
}]);

Route::post('landlord/property/status', ['middleware' => 'auth', function() {
	$res = App\Property::status_update(Input::all());
	if(!is_array($res)) {echo 'Invliad response from server.'; die();}
	if($res['status'] == 'done') {echo 'Done'; die();} //return redirect('landlord/property')->with('success','Property status changed.');
	else {echo $res['message']; die();} //return redirect('landlord/property')->with('error',$res['message']);
}]);

Route::post('landlord/property', ['middleware' => 'auth', function() {
	$res = App\Property::status_update(Input::all());
	if(!is_array($res)) return 'Invalid response from server.';
	if($res['status'] == 'done') return redirect('landlord/property')->with('success','New lease created.');
	else return redirect('landlord/property')->with('error',$res['message'])->withInput();
}]);

Route::get('landlord/property/lease/edit/{id}', ['middleware' => 'auth', function($id) {
	$id = intval($id);
	$lease = App\Lease::find($id);
	if($lease)
		return view('landlord.leaseedit')->with('lease',$lease);
	else
		return redirect('landlord/property')->with('error','Lease not found.');
}]);

Route::post('landlord/property/lease/edit/{id}', ['middleware' => 'auth', function($id) {
	$id = intval($id);
	$input = Input::all();
	$input['id'] = $id;
	$res = App\Lease::do_update($input);
	if(!is_array($res)) return 'Invalid response from server.';
	if($res['status'] == 'done') return redirect('landlord/property')->with('success','Lease & Tenant information updated.');
	else return redirect('landlord/property/lease/edit/'.$id)->with('error',$res['message']);
}]);

Route::get('landlord/lease/info/{id}', ['middleware' => 'auth', function($id) {
	$id = intval($id);
	$input = Input::all();
	$lease = App\Lease::find($id);
	$return = array();
	if($lease)
	{
		$unit = App\Unit::find($lease->unit_id);
		if($unit)
		{
			$return['address'] = $unit->address;
			$return['unit'] = $unit->number;
			$return['start'] = $lease->start;
			$return['end'] = $lease->end;
			$return['tenant'] = App\Lease::parse_tenant($lease->tenant);
			$return['rent'] = $lease->rent;
			$return['phone'] = App\Lease::parse_phone($lease->tenant);
			$return['email'] = App\Lease::parse_email($lease->tenant);
			return $return;
			die();
		}
	}
}]);

// Invoices
Route::get('landlord/invoices', ['middleware' => 'auth', function() {
	return view('landlord.invoices');
}]);

Route::post('landlord/invoice/create', ['middleware' => 'auth', function() {
	$res = App\Invoice::do_create(Input::all());
	if(!is_array($res)) return 'Invalid response from server.';
	if($res['status'] == 'done') return redirect('landlord/leases')->with('success','New invoice created and emailed.');
	else return redirect('landlord/leases')->with('error',$res['message']);
}]);

Route::get('landlord/invoice/{id}', ['middleware' => 'auth', function($id) {
	$id = intval($id);
	return view('landlord.invoicesingle')->with('id',$id);
}]);

// Units
Route::get('landlord/property/unit/edit/{id}', ['middleware' => 'auth', function($id) {
	$id = intval($id);
	$unit = App\Unit::find($id);
	if($unit)
		return view('landlord.unitedit')->with('unit',$unit);
	else
		return redirect('landlord/property')->with('error','Unit not found.');
}]);

Route::post('landlord/property/unit/edit/{id}', ['middleware' => 'auth', function() {
	$id = Input::get('id');
	$res = App\Unit::do_update(Input::all());
	if($res['status'] == 'done') return redirect('landlord/property')->with('success','Unit information updated.');
	else return redirect('landlord/property/unit/edit/'.$id)->with('error',$res['message']);
}]);

Route::get('landlord/property/remove/unit/{id}', ['middleware' => 'auth', function($id) {
	$id = intval($id);
	$input = Input::all();
	$input['id'] = $id;
	$res = App\Property::do_remove_unit($input);
	if($res['status'] == 'done') return redirect('landlord/property')->with('success','Property removed.');
	else return redirect('landlord/proerty')->with('error',$res['message']);
}]);

Route::get('landlord/contacts', ['middleware' => 'auth', function() {
	return view('landlord.contactstenants');
}]);

Route::get('landlord/contacts/tenants/add', ['middleware' => 'auth', function() {
	return view('landlord.contactstenantsadd');
}]);

Route::get('landlord/contacts/owners/add', ['middleware' => 'auth', function() {
	return view('landlord.contactsownersadd');
}]);

Route::get('landlord/contacts/servicepros/add', ['middleware' => 'auth', function() {
	return view('landlord.contactsserviceprosadd');
}]);

Route::get('landlord/contacts/vendors/add', ['middleware' => 'auth', function() {
	return view('landlord.contactsvendorsadd');
}]);

/************************************
 T E N A N T
 ************************************/
Route::get('tenant/dashboard', ['middleware' => 'auth', function() {
	return view('dashboards.tenant');
}]);
