<?php

namespace App;

use Auth;
use Validator;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
	public static function save_units($input)
	{
		if($input['type'] == 'house')
		{
			$u = new Unit;
			$u->number = $input['house_number'];
			$u->footage = $input['house_footage'];
			$u->beds = $input['house_beds'];
			$u->baths = $input['house_baths'];
			$u->rent = $input['house_rent'];
			$u->property_id = $input['property_id'];
			$u->address = $input['formatted_address'];
			$u->save();
			return true;
		}
		$unit_array = array();
		$unit_array = self::parse_unit_array($input);

		if(!empty($unit_array))
		{
			foreach($unit_array as $unit)
			{
				$u = new Unit;
				$ua = array();
				$ua = explode(',',$unit);
				$u->number = $ua[0];
				$u->footage = $ua[1];
				$u->beds = $ua[2];
				$u->baths = $ua[3];
				$u->rent = $ua[4];
				$u->property_id = $input['property_id'];
				$u->address = $input['formatted_address'];
				$u->save();
			}
		}
	}

	public static function do_update($input)
	{
		$id = $input['id'];
		$u = Unit::find($id);
		if(!$u) return array('status' => 'error', 'message' => 'Unit not found.');

		$u->number = $input['unit_number'];
		$u->footage = $input['unit_footage'];
		$u->beds = $input['unit_beds'];
		$u->baths = $input['unit_baths'];
		$u->rent = $input['unit_rent'];
		$u->save();
		return array('status' => 'done');
	}

	public static function parse_unit_array($input)
	{
		$info = array();
		$string = '';
		$big_array = array();
		$count = 0;
		foreach($input as $k => $v)
		{
			if(strpos($k,"unit_") !== false)
			{
					$info[] = $v;
					$count++;
					if($count % 5 == 0)
					{
						$string = implode(',',$info);
						$big_array[] = $string;
						$info = array();
					}
			}
		}

		return $big_array;
	}

	public static function parse_house_array($input)
	{
		$info = array();
		foreach($input as $k => $v)
		{
			if(strpos($k,"house_") !== false)
			{
				$info[] = $v;
			}
		}

		return array(implode(',',$info));
	}
}