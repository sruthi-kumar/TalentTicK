<?php
include_once '../autoload.php';

//debug($_POST);

$status = 'success';

/* [firstname] =>
[lastname] =>
[gender] =>
[email] =>
[phone] =>
[password] =>
[confirmpassword] =>  */

function validate_form($form_data) {

	$status = true;

	if (empty($form_data['firstname'])) {
		$status = false;
	}

	if (empty($form_data['lastname'])) {
		$status = false;
	}

	if (empty($form_data['gender']) || !in_array($form_data['gender'], ['Male', 'Female', 'Others'])) {
		$status = false;
	}

	if (empty($form_data['email'])) {
		$status = false;
	}

	return $status;
}

if (validate_form($_POST)) {

	$user = new User();
	$user->setData('username', $_POST['email']);
	$user->setData('password', md5($_POST['password']));
	$user->setData('type', 'student');

	//debug($user);

	$result = $user->create();

	//debug($result);

	if ($result) {

		$student = new Student();
		$student->setData('user_id', $result['user_id']);
		$student->setData('firstname', $_POST['firstname']);
		$student->setData('lastname', $_POST['lastname']);
		$student->setData('mobile_number', $_POST['mobile_number']);
		$student->setData('gender', $_POST['gender']);

		$result = $student->create();
		//debug($result);

		if ($result) {

			$notification = new Notification();

			$notification->setData('user', conf('admin_id'));
			$notification->setData('title', "New Recruiter Registered");
			$notification->setData('description', "New Recruiter Registerd in Portal.\n Please check & verify");

			if ($notification->create()) {

				$to_address = $_POST['email'];
				$subject = "TalenTick Job Portal Registration Successfull!";
				$body = "Hi" . $_POST['company_name'] . " , <br>
			Your Profile has been successfully registered wih our portal. <br>
			We will notify you once your profile has been approved.
			";

				//send_email_notification($to_address, $subject, $body);

			}

		} else {
			$status = 'failed';
			$_SESSION['errors']['register'] = "Registration Failed!";
		}

	} else {
		$status = 'failed';
		$_SESSION['errors']['register'] = "Registration Failed!";
	}
} else {
	$_SESSION['errors']['register'] = "Invalid Registration Data!";
}

header("location:../registration-status.php?type=student&status=$status");
