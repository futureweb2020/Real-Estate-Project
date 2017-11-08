<?php

namespace App;

use Auth;
use Validator;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Lease extends Model
{
	public static function do_create($input)
	{
		$l = new Lease;
		$l->landlord_id = Auth::user()->id;
		$l->start = $input['start'];
		$l->end = $input['end'];
		$l->rent = $input['rent'];
		$l->day_due = $input['day_due'];
		$l->deposit = $input['deposit'];
		$tenant = self::save_tenant($input);
		$l->tenant = $tenant;
		$l->status = 'active';
		$l->save();
		$u = Unit::find($input['id']);
		if($u)
		{
			$u->status = 'occupied';
			$u->lease_id = $l->id;
			$u->tenant = $tenant;
			$u->save();
			$p = Property::find($u->property_id);
			$l->property_id = $p->id;
			$l->unit_id = $u->id;
			$l->save();
		}
		return true;
	}

	public static function do_update($input)
	{
		$id = $input['id'];
		$l = Lease::find($id);
		if(!$l) return array('status' => 'error', 'messsage' => 'Lease not found.');

		$l->start = $input['start'];
		$l->end = $input['end'];
		$l->rent = $input['rent'];
		$l->deposit = $input['deposit'];
		$l->day_due = $input['day_due'];
		$tenant = self::save_tenant($input);
		$l->tenant = $tenant;
		$l->save();
		$u = Unit::find($l->unit_id);
		if($u)
		{
			$u->tenant = $tenant;
			$u->save();
		}
		return array('status' => 'done');
	}

	public static function due_amount($lease)
	{
		$now = new DateTime("now");
		$start = new DateTime($lease->start);
		$rent = $lease->rent;
		$paid = 0;

		$invoices = Invoice::where('lease_id','=',$lease->id)->where('status','=',$paid)->get();
		if($invoices)
		{
			foreach($invoices as $invoice)
			{
				$paid += $invoice->amount;
			}
		}

		$due_months_interval = $now->diff($start);
		$due_months = $due_months_interval->m + 12 * $due_months_interval->y;

		setlocale(LC_MONETARY, 'en_US.UTF-8');
		if($due_months_interval->days > 0)
			$due_months++;

		$due = money_format('%.2n',($rent*$due_months));

		return $due;
	}

	public static function save_tenant($input)
	{
		$a = array();
		foreach($input as $k => $v)
		{
			if(strpos($k,"tenant_") !== false)
			{
				$a[] = $v;
			}
		}

		return implode(',',$a);
	}

	public static function array_tenant($string)
	{
		return explode(',',$string);
	}

	public static function parse_tenant($string)
	{
		if($string == '') return '';

		$array = explode(',',$string);
		return $array[0];
	}

	public static function parse_phone($string)
	{
		if($string == '') return '';
		$array = explode(',',$string);
		return $array[2];
	}

	public static function parse_email($string)
	{
		if($string == '') return '';
		$array = explode(',',$string);
		return $array[1];
	}

	public static function parse_emergency($string)
	{
		if($string == '') return '';
		$array = explode(',',$string);
		return $array[3];
	}
}