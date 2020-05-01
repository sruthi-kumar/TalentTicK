<?php
require_once '../autoload.php';

validate_user('valid_user');

$status = 'success';

$notification = new Notification();

if (isset($_GET['id'])) {

	$notification->setData('id', $_GET['id']);
	$notification->setData('status', 'in-active');
	$notification->update();
}

header("location:../" . $login_details['user_data']['type'] . "/notifications.php?status=$status");