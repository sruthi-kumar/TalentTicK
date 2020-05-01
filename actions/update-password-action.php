<?php
require_once '../autoload.php';

$current_user = get_current_user_set();

//debug($current_user);

$user_id = $current_user['user_data']['user_id'];

$password = $_POST['password'];

if (!empty($password)) {
	$password = md5($password);

	$user = new User();

	$user_details = $user->getUserById($user_id);

	//debug($user_details);

	$user->setData('username', $user_details['username']);
	$user->setData('password', md5($_POST['password']));
	$user->setData('type', $user_details['type']);
	$user->setData('status', $user_details['status']);

	$user->update($user_id);

	header('location:../../actions/logout.php');
}