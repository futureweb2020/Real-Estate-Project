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
	return view('auth.register');
});


/************************************
 L O G I N
*************************************/
Route::get('login',function() {
	return view('auth.login');
});

Route::post('login',function() {
	return view('auth.login');
});

/************************************
 T E N A N T
 ************************************/
Route::get('tenant/dashboard',function() {
	return view('dashboards.tenant');
});
