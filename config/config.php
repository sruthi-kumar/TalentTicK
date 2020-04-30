<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$site_name = 'TalenTick';

function config($key) {

	$conf_array = array(
		'site_name' => 'TalenTick',
		'admin_id' => '1',
		'admin_email' => 'sreekuttan.m.achari@gmail.com',
		'env' => 'local',
		'send_mail' => false,

	);

	return $conf_array[$key] ?? null;

}
