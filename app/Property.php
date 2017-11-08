<?php

namespace App;

use Auth;
use Validator;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
	public static function do_add($input)
	{
		// Error checking
		if(!array_key_exists('a',$input)) return array('status' => 'error', 'message' => 'You must enter the address for the property.');
		if($input['a'] == '') return array('status' => 'error', 'message' => 'You must enter the address for the property.');
		if($input['type'] == '-1') return array('status' => 'error', 'message' => 'You must select a property.');
		$unit_check = self::check_unit_info($input);
		if($unit_check == false) return array('status' => 'error', 'message' => 'Please double check the unit information');
		if(Auth::guest()) return array('status' => 'error', 'message' => 'You must be logged in to add a property.');

		$p = new Property;
		$p->user_id = Auth::user()->id;
		$p->name = $input['formatted_address'];
		$p->street = self::parse_street($input['formatted_address']);
		$p->city = $input['locality'];
		$p->state = $input['administrative_area_level_1'];
		$p->postal = $input['postal_code'];
		$p->country = $input['country'];
		$p->status = 'vacant';
		$p->owner_id = 1;
		if($input['type'] == 'apartment' || $input['type'] == 'condo')
		{
			$units = self::do_unit_info($input);
			$p->units = self::count_units($units);
			$p->unit_info = $units;
		}
		else
		{
			$p->units = 1;
			$p->unit_info = self::do_house_info($input);
		}
		$p->map = $input['googlemap'];
		$p->lat = $input['lat'];
		$p->lng = $input['lng'];

		$p->save();

		$input['property_id'] = $p->id;
		Unit::save_units($input);

		return array('status' => 'done');
	}

	public static function do_update($input)
	{
		$rules = array(
			'name'			=> 'required',
			'street'		=> 'required',
			'city'			=> 'required',
			'state'			=> 'required',
			'postal'		=> 'required',
			'country'		=> 'required',
			'unit_number'	=> 'required',
			'unit_type'		=> 'required',
			'unit_rent'		=> 'required'
		);
		$validation = Validator::make($input,$rules);
		if($validation->fails()) return array('status' => 'error', 'message' => $validation->errors()->first());

		$p = self::find($input['property_id']);
		if(!$p)
		{
			return array('status' => 'error', 'message' => 'Property not found.');
		}
		
		$p->name = $input['name'];
		$p->year = $input['year'];
		$p->mls = $input['mls'];
		$p->street = $input['street'];
		$p->city = $input['city'];
		$p->county = $input['county'];
		$p->state = $input['state'];
		$p->postal = $input['postal'];
		$p->country = $input['country'];
		$p->amenities = self::do_amenities_save($input);
		$p->description = $input['description'];
		$p->owner_id = 1; //$input['owner_id'];
		$p->owner_stats = self::do_owner_stats($input);
		$p->unit_info = self::do_unit_info($input);
		$p->insurance_info = self::do_insurance_info($input);
		$p->save();

		return array('status' => 'done');
	}

	// Change status of property (add/remove lease and tenant)
	public static function status_update($input)
	{
		$u = Unit::find($input['id']);
		if(!$u) return array('status' => 'error', 'message' => 'Property unit not found.');

		if($input['status'] == 'occupied')
		{
			$u->status = 'vacant';
			$l_id = $u->lease_id;
			$lease = Lease::find($l_id);
			if($lease)
			{
				$lease->status = 'terminated';
				$lease->save();
			}
			$u->lease_id = 0;
			$u->tenant = '';
			$u->save();
			return array('status' => 'done');
		}
		else
		{
			Lease::do_create($input);
			return array("status" => 'done');
		}
	}

	// Remove a unit and all leases from a property
	public static function do_remove_unit($input)
	{
		$id = $input['id'];
		$unit = Unit::find($id);
		if(!$unit) return array('status' => 'error', 'message' => 'Unit not found.');
		$unit->status = 'deleted';
		$unit->save();

		$leases = Lease::where('unit_id','=',$unit->id)->get();
		if($leases)
		{
			foreach($leases as $le)
			{
				$le->status = 'deleted';
				$le->save();
			}
		}

		return array('status' => 'done');
	}

	public static function count_units($string)
	{
		$a = array();
		$count = 1;

		$a = explode(',',$string);
		$c = count($a);
		if($c != 0 || $c % 5 != 0)
			$count = $c/5;
		else
			$count = 1;

		return $count;
	}

	public static function check_unit_info($input)
	{
		return true;
	}

	public static function parse_street($string)
	{
		$a = array();
		$a = explode(', ',$string);
		return $a[0];
	}

	public static function do_amenities_save($input)
	{
		$ams = array();
		foreach($input as $k => $p)
		{
			if($p == '9999')
			{
				$ams[] = $k;
			}
		}

		$string = implode(',',$ams);
		return $string;
	}

	public static function do_owner_stats($input)
	{
		$stats = array();
		foreach($input as $k => $v)
		{
			if(strpos($k,"owner_") !== false)
			{
				$stats[] = $v;
			}
		}

		return implode(',',$stats);
	}

	public static function do_unit_info($input)
	{
		$info = array();
		foreach($input as $k => $v)
		{
			if(strpos($k,"unit_") !== false)
			{
				$info[] = $v;
			}
		}

		return implode(',',$info);
	}

	public static function do_house_info($input)
	{
		$info = array();
		foreach($input as $k => $v)
		{
			if(strpos($k,"house_") !== false)
			{
				$info[] = $v;
			}
		}

		return implode(',',$info);
	}

	public static function do_insurance_info($input)
	{
		$info = array();
		foreach($input as $k => $v)
		{
			if(strpos($k,"insurance_") !== false)
			{
				$info[] = $v;
			}
		}

		return implode(',',$info);
	}

	public static function get_unit_number($obj)
	{
		$array = explode(',',$obj->unit_info);
		return $array[0];
	}

	public static function parse_property_data($string)
	{
		return explode(',',$string);
	}

	public static function amenity_exists($needle,$haystack)
	{

	}
}