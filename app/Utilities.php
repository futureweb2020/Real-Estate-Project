<?php

namespace App;

class Utilities
{
	public static function fix_date($date)
	{
		$arr = explode('-',$date);
		return $arr[1].'-'.$arr[2].'-'.$arr[0];
	}

	public static function state_short_to_long($state)
	{
		$array = self::states_short_key();
		if(array_key_exists($state,$array))
			return $array[$state];
		else
			return false;
	}

	public static function state_rebuild()
	{
		$array = self::states_short_key();
		$a = array();
		foreach($array as $k => $v)
		{
			$a[$v] = $k;
		}
		dd($a);
	}

	public static function countries_array()
	{
		return array(
			"Afghanistan", 
			"Aland Islands", 
			"Albania", 
			"Algeria", 
			"American Samoa", 
			"Andorra", 
			"Angola", 
			"Anguilla", 
			"Antarctica", 
			"Antigua", 
			"Argentina", 
			"Armenia", 
			"Aruba", 
			"Australia", 
			"Austria", 
			"Azerbaijan", 
			"Bahamas", 
			"Bahrain", 
			"Bangladesh", 
			"Barbados", 
			"Barbuda", 
			"Belarus", 
			"Belgium", 
			"Belize", 
			"Benin", 
			"Bermuda", 
			"Bhutan", 
			"Bolivia", 
			"Bosnia", 
			"Botswana", 
			"Bouvet Island", 
			"Brazil", 
			"British Indian Ocean Trty.", 
			"Brunei Darussalam", 
			"Bulgaria", 
			"Burkina Faso", 
			"Burundi", 
			"Caicos Islands", 
			"Cambodia", 
			"Cameroon", 
			"Canada", 
			"Cape Verde", 
			"Cayman Islands", 
			"Central African Republic", 
			"Chad", 
			"Chile", 
			"China", 
			"Christmas Island", 
			"Cocos (Keeling) Islands", 
			"Colombia", 
			"Comoros", 
			"Congo", 
			"Congo, Democratic Republic of the", 
			"Cook Islands", 
			"Costa Rica", 
			"Cote d'Ivoire", 
			"Croatia", 
			"Cuba", 
			"Cyprus", 
			"Czech Republic", 
			"Denmark", 
			"Djibouti",
			"Dominica", 
			"Dominican Republic", 
			"Ecuador", 
			"Egypt", 
			"El Salvador", 
			"Equatorial Guinea", 
			"Eritrea",
			"Estonia", 
			"Ethiopia", 
			"Falkland Islands (Malvinas)", 
			"Faroe Islands", 
			"Fiji", 
			"Finland", 
			"France", 
			"French Guiana", 
			"French Polynesia", 
			"French Southern Territories", 
			"Futuna Islands", 
			"Gabon", 
			"Gambia", 
			"Georgia", 
			"Germany", 
			"Ghana", 
			"Gibraltar", 
			"Greece", 
			"Greenland", 
			"Grenada", 
			"Guadeloupe", 
			"Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard", "Herzegovina", "Holy See", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Jan Mayen Islands", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea", "Korea (Democratic)", "Kuwait", "Kyrgyzstan", "Lao", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "McDonald Islands", "Mexico", "Micronesia", "Miquelon", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "Nevis", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Palestinian Territory, Occupied", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Principe", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Barthelemy", "Saint Helena", "Saint Kitts", "Saint Lucia", "Saint Martin (French part)", "Saint Pierre", "Saint Vincent", "Samoa", "San Marino", "Sao Tome", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia", "South Sandwich Islands", "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "The Grenadines", "Timor-Leste", "Tobago", "Togo", "Tokelau", "Tonga", "Trinidad", "Tunisia", "Turkey", "Turkmenistan", "Turks Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "US Minor Outlying Islands", "Uzbekistan", "Vanuatu", "Vatican City State", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (US)", "Wallis", "Western Sahara", "Yemen", "Zambia", "Zimbabwe");
	}

	public static function states_short_key()
	{
		return array(
			'AL'=>'ALABAMA',
			'AK'=>'ALASKA',
			'AS'=>'AMERICAN SAMOA',
			'AZ'=>'ARIZONA',
			'AR'=>'ARKANSAS',
			'CA'=>'CALIFORNIA',
			'CO'=>'COLORADO',
			'CT'=>'CONNECTICUT',
			'DE'=>'DELAWARE',
			'DC'=>'DISTRICT OF COLUMBIA',
			'FM'=>'FEDERATED STATES OF MICRONESIA',
			'FL'=>'FLORIDA',
			'GA'=>'GEORGIA',
			'GU'=>'GUAM GU',
			'HI'=>'HAWAII',
			'ID'=>'IDAHO',
			'IL'=>'ILLINOIS',
			'IN'=>'INDIANA',
			'IA'=>'IOWA',
			'KS'=>'KANSAS',
			'KY'=>'KENTUCKY',
			'LA'=>'LOUISIANA',
			'ME'=>'MAINE',
			'MH'=>'MARSHALL ISLANDS',
			'MD'=>'MARYLAND',
			'MA'=>'MASSACHUSETTS',
			'MI'=>'MICHIGAN',
			'MN'=>'MINNESOTA',
			'MS'=>'MISSISSIPPI',
			'MO'=>'MISSOURI',
			'MT'=>'MONTANA',
			'NE'=>'NEBRASKA',
			'NV'=>'NEVADA',
			'NH'=>'NEW HAMPSHIRE',
			'NJ'=>'NEW JERSEY',
			'NM'=>'NEW MEXICO',
			'NY'=>'NEW YORK',
			'NC'=>'NORTH CAROLINA',
			'ND'=>'NORTH DAKOTA',
			'MP'=>'NORTHERN MARIANA ISLANDS',
			'OH'=>'OHIO',
			'OK'=>'OKLAHOMA',
			'OR'=>'OREGON',
			'PW'=>'PALAU',
			'PA'=>'PENNSYLVANIA',
			'PR'=>'PUERTO RICO',
			'RI'=>'RHODE ISLAND',
			'SC'=>'SOUTH CAROLINA',
			'SD'=>'SOUTH DAKOTA',
			'TN'=>'TENNESSEE',
			'TX'=>'TEXAS',
			'UT'=>'UTAH',
			'VT'=>'VERMONT',
			'VI'=>'VIRGIN ISLANDS',
			'VA'=>'VIRGINIA',
			'WA'=>'WASHINGTON',
			'WV'=>'WEST VIRGINIA',
			'WI'=>'WISCONSIN',
			'WY'=>'WYOMING',
			'AE'=>'ARMED FORCES AFRICA \ CANADA \ EUROPE \ MIDDLE EAST',
			'AA'=>'ARMED FORCES AMERICA (EXCEPT CANADA)',
			'AP'=>'ARMED FORCES PACIFIC'
		);
	}

	public static function state_long_key()
	{
		return array(
			"ALABAMA" => "AL",
			"ALASKA" => "AK",
			"AMERICAN SAMOA" => "AS",
			"ARIZONA" => "AZ",
			"ARKANSAS" => "AR",
			"CALIFORNIA" => "CA",
			"COLORADO" => "CO",
			"CONNECTICUT" => "CT",
			"DELAWARE" => "DE",
			"DISTRICT OF COLUMBIA" => "DC",
			"FEDERATED STATES OF MICRONESIA" => "FM",
			"FLORIDA" => "FL",
			"GEORGIA" => "GA",
			"GUAM GU" => "GU",
			"HAWAII" => "HI",
			"IDAHO" => "ID",
			"ILLINOIS" => "IL",
			"INDIANA" => "IN",
			"IOWA" => "IA",
			"KANSAS" => "KS",
			"KENTUCKY" => "KY",
			"LOUISIANA" => "LA",
			"MAINE" => "ME",
			"MARSHALL ISLANDS" => "MH",
			"MARYLAND" => "MD",
			"MASSACHUSETTS" => "MA",
			"MICHIGAN" => "MI",
			"MINNESOTA" => "MN",
			"MISSISSIPPI" => "MS",
			"MISSOURI" => "MO",
			"MONTANA" => "MT",
			"NEBRASKA" => "NE",
			"NEVADA" => "NV",
			"NEW HAMPSHIRE" => "NH",
			"NEW JERSEY" => "NJ",
			"NEW MEXICO" => "NM",
			"NEW YORK" => "NY",
			"NORTH CAROLINA" => "NC",
			"NORTH DAKOTA" => "ND",
			"NORTHERN MARIANA ISLANDS" => "MP",
			"OHIO" => "OH",
			"OKLAHOMA" => "OK",
			"OREGON" => "OR",
			"PALAU" => "PW",
			"PENNSYLVANIA" => "PA",
			"PUERTO RICO" => "PR",
			"RHODE ISLAND" => "RI",
			"SOUTH CAROLINA" => "SC",
			"SOUTH DAKOTA" => "SD",
			"TENNESSEE" => "TN",
			"TEXAS" => "TX",
			"UTAH" => "UT",
			"VERMONT" => "VT",
			"VIRGIN ISLANDS" => "VI",
			"VIRGINIA" => "VA",
			"WASHINGTON" => "WA",
			"WEST VIRGINIA" => "WV",
			"WISCONSIN" => "WI",
			"WYOMING" => "WY",
			"ARMED FORCES AFRICA \ CANADA \ EUROPE \ MIDDLE EAST" => "AE",
			"ARMED FORCES AMERICA (EXCEPT CANADA)" => "AA",
			"ARMED FORCES PACIFIC" => "AP"
		);
	}
}


