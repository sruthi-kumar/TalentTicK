<?php
require_once '../autoload.php';

$email = $_POST['email'];
$user = new User();

$user->setData('username', $email);

$user_data = $user->getUserByUsername();

// debug($user_data);

unset($_SESSION['errors']);

$_SESSION['errors']['forgot_password'] = "";

if (!empty($user_data)) {

	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$new_password = substr(str_shuffle($permitted_chars), 0, 8);

	$user->setData('username', $user_data['username']);
	$user->setData('password', md5($new_password));
	$user->setData('type', $user_data['type']);
	$user->setData('status', $user_data['status']);

	//debug($user);

	if ($user->update($user_data['id'])) {

		$to_address = $_POST['email'];
		$subject = "TalenTick Job Portal Password Reset";
		$body = "Hi " . $user_data['username'] . " , <br>   Your new password is : " . $new_password . " <br> ";

		send_email_notification($to_address, $subject, $body);

		unset($_SESSION['errors']);
	}

	header('location:../login.php');
	exit;

} else {
	$_SESSION['errors']['forgot_password'] = "Invalid User";
	header('location:../forgot-password.php?status=failed');
	exit;
}