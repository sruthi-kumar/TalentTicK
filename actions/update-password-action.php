<?php
require_once '../autoload.php';

$current_user = get_current_user_set();

//debug($current_user);JECjeYu9

//debug($_POST);

$user_id = $current_user['user_data']['user_id'];

if (!empty($_POST['current_password']) && !empty($_POST['new_password'])) {

	$user = new User();

	$user_details = $user->getUserById($user_id);

	//debug($user_details);

	if (md5($_POST['currrent_password']) == $user_details['password']) {

		$user->setData('username', $user_details['username']);
		$user->setData('password', md5($_POST['new_password']));
		$user->setData('type', $user_details['type']);
		$user->setData('status', $user_details['status']);

		$user->update($user_id);

		header('location:../' . $user_details['type'] . '/update-password.php?status=success');
		exit;

	} else {
		$_SESSION['errors']['update_password'] = "Error: Current Password Does not match!";
		header('location:../' . $user_details['type'] . '/update-password.php?status=failed');
		exit;
	}

} else {
	$_SESSION['errors']['update_password'] = "Invalid Form Data";
	header('location:../' . $user_details['type'] . '/update-password.php?status=failed');
	exit;
}