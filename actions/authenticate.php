<?php
require_once '../autoload.php';

$email = $_POST['email'];
$password = $_POST['password'];

$user = new User();

$user->setData('username', $email);

$user_data = $user->getUserByUsername();

//print_r($user_data ) ; exit ;
$_SESSION['errors']['auth'] = "";

if (!empty($user_data)) {
	if ($user_data['password'] == md5($password)) {

		//debug($user_data);

		unset($user_data['username']);
		unset($user_data['password']);

		$user_data['user_id'] = $user_data['id'];

		if ($user_data['type'] == 'recruiter') {

			$recruiter = new Recruiter();

			$recruiter_data = $recruiter->getRecruiterByUserId($user_data['id']);

			//debug($recruiter_data);

			$user_data['recruiter_id'] = $recruiter_data['id'];
			$user_data['company_name'] = $recruiter_data['company_name'];
			$user_data['recruiter_status'] = $recruiter_data['status'];

			//debug($user_data);

			if ($user_data['recruiter_status'] != 'approved' && false) {

				header('location:../' . $user_data['type'] . '/account-status.php');
				exit;

			}

		}

		if ($user_data['type'] == 'student') {

			$student = new Student();

			$student_data = $student->getStudentByUserId($user_data['id']);

			//debug($student_data);

			$user_data['student_id'] = $student_data['id'];
			$user_data['full_name'] = $student_data['firstname'] . " " . $student_data['lastname'];
			$user_data['payment_status'] = $student_data['payment_status'];

			//debug($user_data);

			if ($user_data['payment_status'] != 'paid' && false) {

				header('location:../' . $user_data['type'] . '/account-status.php');
				exit;

			}

		}

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