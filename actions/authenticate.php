<?php
include_once '../autoload.php';

$email = $_POST['email'];
$password = $_POST['password'];

$user = new User();

$user->setData('username', $email);

$user_data = $user->getUserByUsername();

//print_r($user_data ) ; exit ;
$_SESSION['errors']['auth'] = "";

if (!empty($user_data)) {
	if ($user_data['password'] == md5($password)) {
		$_SESSION['user_data'] = $user_data;
		//print_r($user_data ) ; exit ;
		header('location:../' . $user_data['type'] . '/index.php');
		exit;
	} else {
		$_SESSION['errors']['auth'] = "Wrong Password! Please try again";
		header('location:../login.php?status=fail');
		exit;
	}
} else {
	$_SESSION['errors']['auth'] = "Invalid User";
	header('location:../login.php');
	exit;
}