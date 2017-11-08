<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public static function do_create($input)
    {
    	$rules = array('email' => 'required|max:250');
    	$validation = App\Validator::make($input,$rules);
    	if($validation->fails()) return array('status' => 'error', 'message' => $validation->errors->first());

    	$i = new Invoice;
    	$i->lease_id = $input['lease_id'];
    	$i->line_items = self::line_items($input);
    	$costs = self::line_costs($input);
    	$i->line_costs = $costs;
    	if(array_key_exists('taxable',$input) && $input['taxable'] == 'on')
	    	$taxable = 'yes';
	    else
	    	$taxable = 'no';
	    $i->taxable = $taxable;
    	$i->tax_percentage = $input['tax_percentage'];
    	$i->total = self::get_total($costs,$taxable,$input['tax_percentage']);
    	$i->status = 'unpaid';
    	$i->save();
    	return array('status' => 'done');
    }

    public static function line_items($input)
    {
		$a = array();
		foreach($input as $k => $v)
		{
			if(strpos($k,"line_item_") !== false)
			{
				$a[] = $v;
			}
		}

		return implode(',',$a);
    }

    public static function line_costs($input)
    {
    	$a = array();
		foreach($input as $k => $v)
		{
			if(strpos($k,"line_cost_") !== false)
			{
				$a[] = $v;
			}
		}

		return implode(',',$a);
    }

    public static function get_total($costs,$is_taxable,$rate)
    {
    	$array = explode(',',$costs);
    	$cost_total = 0;
    	foreach($array as $a)
    	{
    		$cost_total += $a;
    	}
    	if($is_taxable == 'yes')
    	{
    		$cost_tax = $cost_total * $rate;
    		$cost_total += $cost_tax;
    	}

    	return $cost_total;
    }
}
