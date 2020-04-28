<?php
require_once '../autoload.php';

//debug($_POST);

$status = 'success';

/*
<!--  `user_id`, `username`, `password`, `type`, `status`, `created_at`, `updated_at`
`recruiter_id`, `user_id`, `company_name`, `email`, `website`, `phone`, `address`, `license`, `city`, `pincode` -->  */

function validate_form($form_data) {

	$status = true;

	if (empty($form_data['company_name'])) {
		$status = false;
	}

	if (empty($form_data['phone'])) {
		$status = false;
	}

	if (empty($form_data['address'])) {
		$status = false;
	}

	if (empty($form_data['license'])) {
		$status = false;
	}

	if (empty($form_data['city'])) {
		$status = false;
	}

	if (empty($form_data['pincode'])) {
		$status = false;
	}

	if (empty($form_data['username'])) {
		$status = false;
	}

	if (empty($form_data['email'])) {
		$status = false;
	}

	return $status;
}

if (validate_form($_POST)) {

	$user = new User();
	$user->setData('username', $_POST['username']);
	$user->setData('password', md5($_POST['password']));
	$user->setData('type', 'recruiter');

	//debug($user);

	$result = $user->create();

	//debug($result);

/*`recruiter_id`, `user_id`, `company_name`, `email`, `website`, `phone`, `address`, `license`, `city`, `pincode*/

	if ($result) {

		$recruiter = new Recruiter();
		$recruiter->setData('user_id', $result['user_id']);
		$recruiter->setData('company_name', $_POST['company_name']);
		$recruiter->setData('email', $_POST['email']);
		$recruiter->setData('website', $_POST['website']);
		$recruiter->setData('phone', $_POST['phone']);
		$recruiter->setData('address', $_POST['address']);
		$recruiter->setData('license', $_POST['license']);
		$recruiter->setData('city', $_POST['city']);
		$recruiter->setData('pincode', $_POST['pincode']);

		//debug($recruiter);

		$result = $recruiter->create();
		//debug($result);

		if ($result) {

			$notification = new Notification();

			$notification->setData('user', config('admin_id'));
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
	$status = 'failed';
	$_SESSION['errors']['register'] = "Invalid Registration Data!";
}

header("location:../registration-status.php?type=recruiter&status=$status");
