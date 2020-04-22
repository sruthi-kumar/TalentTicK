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

function set_model_data($data) {

	$keys = array_keys($data);
	$fields = implode(', ', $keys);
	$placeholder = substr(str_repeat('?,', count($keys)), 0, -1);

	return array(
		'fields' => $fields,
		'placeholder' => $placeholder,
		'values' => array_values($data),
	);

}