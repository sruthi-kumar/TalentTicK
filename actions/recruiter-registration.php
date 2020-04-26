<?php
include_once '../autoload.php';

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
	$user->setUserData('username', $_POST['username']);
	$user->setUserData('password', md5($_POST['password']));
	$user->setUserData('type', 'recruiter');

	//debug($user);

	$result = $user->createUser();

	//debug($result);

/*`recruiter_id`, `user_id`, `company_name`, `email`, `website`, `phone`, `address`, `license`, `city`, `pincode*/

	if ($result) {

		$recruiter = new Recruiter();
		$recruiter->setRecruiterData('user_id', $result['user_id']);
		$recruiter->setRecruiterData('company_name', $_POST['company_name']);
		$recruiter->setRecruiterData('email', $_POST['email']);
		$recruiter->setRecruiterData('website', $_POST['website']);
		$recruiter->setRecruiterData('phone', $_POST['phone']);
		$recruiter->setRecruiterData('address', $_POST['address']);
		$recruiter->setRecruiterData('license', $_POST['license']);
		$recruiter->setRecruiterData('city', $_POST['city']);
		$recruiter->setRecruiterData('pincode', $_POST['pincode']);

		//debug($recruiter);

		$result = $recruiter->createRecruiter();
		//debug($result);

		if ($result) { 

			$to_address = $_POST['email'];
			$subject = "TalenTick Job Portal Registration Successfull!";
			$body = "

			Hi $_POST['company_name'] , <br>

			Your Profile has been successfully registered wih our portal. <br>

			We will notify you once your profile has been approved.


			";

			send_email_notification($to_address, $subject, $body);
		}else{ 
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
