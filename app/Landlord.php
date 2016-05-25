<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    public static function add_expense(Request $request)
    {
    	$this->validate($request, [
    		'contact'			=> 'required',
    		'property'			=> 'required',
    		'due'				=> 'required',
    		'category'			=> 'required',
    		'amount'			=> 'required'
    	]);

    	DB::table('expenses')->insert([
    		'contact'			=> $request->contact,
    		'property'			=> $request->property,
    		'unit'				=> $request->unit,
    		'due'				=> $request->due,
    		'category'			=> $request->category,
    		'amount'			=> $request->amount,
    		'recurring'			=> $request->recurring,
    		'frequency'			=> $request->frequency,
    		'details'			=> $request->details
    	]);

    	return $response()->json('expense' => 'added');
    }

    public static function add_tenant(Request $request)
    {
    	$this->validate($request, [
    		'first_name'		=> 'required',
    		'last_name'			=> 'required'
    	]);

    	DB::table('landlordtenants')->insert([
    		'first_name'		=> $request->first_name,
    		'last_name'			=> $request->last_name,
    		'middle_name'		=> $request->middle_name,
    		'is_company'		=> $request->is_company,
    		'company_name'		=> $request->company_name,
    		'dob'				=> $request->dob,
    		'gender'			=> $request->gender,
    		'primary_email'		=> $request->primary_email,
    		'phone'				=> $request->phone,
    		'insurance'			=> $request->insurance,
    		'forwarding_address'	=> $request->forwarding_address,
    		'notes'				=> $request->notes
    	]);

    	return $response()->json('tenant' => 'added');
    }

    public static function add_property(Request $request)
    {
    	$this->validate($request, [
    		'property'				=> 'required',
    		'street_address'		=> 'required',
    		'city'					=> 'required',
    		'state'					=> 'required',
    		'zip'					=> 'required',
    		'country'				=> 'required',
    		'number_of_units'		=> 'required',
    		'unit_type'				=> 'required',
    		'rent'					=> 'required'
    	]);

    	// Need to parse this data.  Clean in but garbled.

    	return $response()->json('property' => 'added');
    }

    public static function add_maintRequest(Request $request)
    {
    	$this->validate($request, [
    		'type'				=> 'required',
    		'specific'			=> 'required',
    		'status'			=> 'required',
    		'priority'			=> 'required',
    		'property'			=> 'required'
    	]);

    	DB::table('maintenance_requests')->insert([
    		'type'				=> $request->type,
    		'specific'			=> $request->specific,
    		'status'			=> $request->status
    	]);

    	return $response()->json('mainRequest' => 'added');
    }
}
