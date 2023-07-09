<?php
function aatidlm_get_dive_location_data() {
    // contact data
	$arr_dive_type=[__('Dive type :', AATIDLM_TEXTDOMAIN),'aatidlm_dive_type','text',1,'yes',__('What type of dive is this, reef, cave, etc', AATIDLM_TEXTDOMAIN)];
	$arr_gps_coords=[__('Gps Coordinates :', AATIDLM_TEXTDOMAIN),'aatidlm_gps_coords','text',2,'yes',__('GPS coordinates seperated with a comma', AATIDLM_TEXTDOMAIN)];
	$arr_dive_depth=[__('Dive depth :', AATIDLM_TEXTDOMAIN),'aatidlm_dive_depth','text',3,'yes',__('The maximum dive depth', AATIDLM_TEXTDOMAIN)];
	$arr_dive_level=[__('Diver level :', AATIDLM_TEXTDOMAIN),'aatidlm_dive_level','text',4,'yes',__('What type of divers , starter ,advanced, etc', AATIDLM_TEXTDOMAIN)];
	$arr_dive_current=[__('Current :', AATIDLM_TEXTDOMAIN),'aatidlm_dive_current','text',5,'yes',__('Is the current strong or medium ,etc', AATIDLM_TEXTDOMAIN)];
		$arr_dive_area=[__('Area :', AATIDLM_TEXTDOMAIN),'aatidlm_dive_area','text',6,'yes',__('Protected marine area ,etc', AATIDLM_TEXTDOMAIN)];
		$arr_dive_visibility=[__('Visibility :', AATIDLM_TEXTDOMAIN),'aatidlm_dive_visibility','text',7,'yes',__('How far could we possibly see normaly, example 15m-30m ', AATIDLM_TEXTDOMAIN)];
		$arr_dive_distance=[__('Time to reach :', AATIDLM_TEXTDOMAIN),'aatidlm_dive_distance','text',8,'yes',__('How long does it normaly take to arrive at the destination in min. example 35min', AATIDLM_TEXTDOMAIN)];
		$arr_dive_season=[__('Season :', AATIDLM_TEXTDOMAIN),'aatidlm_dive_season','text',9,'yes',__('All saesons , only monsoon etc', AATIDLM_TEXTDOMAIN)];
    return [$arr_dive_type, $arr_gps_coords, $arr_dive_depth, $arr_dive_level, $arr_dive_current,$arr_dive_area,$arr_dive_visibility,$arr_dive_distance,$arr_dive_season];
}

// Define additional arrays
define('AATIDLM_DIVELOCATION_DATA', aatidlm_get_dive_location_data());


function aatidlm_get_fields_array() {
    $dive_location_data = AATIDLM_DIVELOCATION_DATA;
    return array_merge($dive_location_data);
}

define('AATIDLM_FIELDS_ARRAY', aatidlm_get_fields_array());
