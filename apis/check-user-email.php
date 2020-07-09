<?php
require_once '../autoload.php';

if (isset($_GET['email'])) {

	$email = $_GET['email'];

	$results['user_status'] = 'non-existing';

	$user = new User();
	$user->setData('username', $email);
	$userDetails = $user->getUserByUsername();

	//debug($result);

	if ($userDetails) {
		$results['user_status'] = 'existing';
	}

	json_api_response($results);

}
