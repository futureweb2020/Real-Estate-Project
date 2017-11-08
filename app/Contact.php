<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	public static function add_contact($input)
	{

	}

	public static function gender_dropdown()
	{
		$text = '<select name="gender" class="form-control">';
		$text .= '<option value="-1"></option>';
		$text .= '<option value="1">Male</option>';
		$text .= '<option value="2">Female</option>';
		$text .= '<option value="0">Other</option>';
		$text .= '</select>';

		return $text;
	}
}