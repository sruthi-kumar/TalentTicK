<?php

$web_assets = base_url() . '/assets/web';
$admin_assets = base_url() . '/assets/admin';

function base_url() {
	$localfolder = "";
	if (isset($_SERVER['HTTPS'])) {
		$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
	} else {
		$protocol = 'http';
	}

	if ($_SERVER['HTTP_HOST'] == 'localhost') {
		$localfolder = explode('/', $_SERVER['PHP_SELF']);

		$localfolder = '/' . $localfolder[1];

	}
	return $protocol . "://" . $_SERVER['HTTP_HOST'] . $localfolder;
}

function debug($data, $die = true) {
	echo "<pre>";
	//print_r($data);
	var_dump($data);
	if ($die) {
		exit;
	}

}

function set_model_data($data, $operation = 'insert') {

	$model_data = [];

	$keys = array_keys($data);

	$placeholder = substr(str_repeat('?,', count($keys)), 0, -1);

	if ($operation == 'update') {

		$feild_set = [];

		foreach ($keys as $key) {
			$feild_set[] = "$key=?";
		}

		$feild_assignments = implode(', ', $feild_set);
		//debug($feild_assignments);

		$model_data = array(
			'feild_assignments' => $feild_assignments,
			'placeholder' => $placeholder,
			'values' => array_values($data),
		);

	} else {

		$fields = implode(', ', $keys);
		//debug($fields);

		$model_data = array(
			'fields' => $fields,
			'placeholder' => $placeholder,
			'values' => array_values($data),
		);

	}

	return $model_data;

}

function json_api_response($data) {

	header("Content-Type: application/json; charset=UTF-8");
	echo json_encode($data);
	return;
}
