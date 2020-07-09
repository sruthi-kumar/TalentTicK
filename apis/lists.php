<?php
require_once '../autoload.php';

if (isset($_GET['type'])) {

	$type = $_GET['type'];

//debug($_GET);

	switch ($type) {
	case 'districts':
		get_district_list();
		break;

	default:
		# code...
		break;
	}

}

function get_district_list() {

	$results = [];

	if (isset($_GET['state'])) {
		$state_id = trim($_GET['state']);
		$location = new Location();
		$results['districts'] = $location->getDistricts($state_id);

		//debug($results);

	}

	json_api_response($results);

}
