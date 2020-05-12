<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$site_name = 'TalenTick';

function config($key) {

	$conf_array = array(
		'site_name' => 'TalenTick',
		'admin_id' => '1',
		'admin_email' => 'shrutiskumar9633@gmail.com',
		'env' => 'local',
		'send_mail' => true,
		'registration_fees' => (500 * 100),
		'payment_key' => 'rzp_test_QQujy8RekXMXbQ',
		'payment_secret' => 'iImakcoCjZKIDbk9W2NT6G2l',
		'currency' => 'INR',
	);

	return $conf_array[$key] ?? null;

}
