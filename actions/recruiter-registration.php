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

	if ($user->create()) {

		$result = $user->getUserByUsername();

		//debug($result);

/*`recruiter_id`, `user_id`, `company_name`, `email`, `website`, `phone`, `address`, `license`, `city`, `pincode*/

		$recruiter = new Recruiter();
		$recruiter->setData('user_id', $result['id']);
		$recruiter->setData('company_name', $_POST['company_name']);
		$recruiter->setData('email', $_POST['email']);
		$recruiter->setData('website', $_POST['website']);
		$recruiter->setData('phone', $_POST['phone']);
		$recruiter->setData('address', $_POST['address']);
		$recruiter->setData('license', $_POST['license']);
		$recruiter->setData('city', $_POST['city']);
		$recruiter->setData('pincode', $_POST['pincode']);

		if (isset($_FILES) && !empty($_FILES['license_file'])) {

			/*echo ($_FILES["license_file"]["name"]);
				echo "<br>";
				echo ($_FILES["license_file"]["tmp_name"]);
			*/

			$target_dir = "../../uploads/licenses/";

			$imageFileType = strtolower(pathinfo($_FILES["license_file"]["name"], PATHINFO_EXTENSION));

			$enc_name = base64_encode("SSLC_" . $_FILES["license_file"]["name"] . $result['id'] . "." . $imageFileType);
			$target_file = $target_dir . $enc_name;

			if (move_uploaded_file($_FILES["license_file"]["tmp_name"], $target_file)) {

				$license_file = $enc_name;
				echo ("<br> license_file File Uploaded");

				$recruiter->setData('license_file', $license_file);

			} else {
				echo ("<br> license_file File Upload Failed");
			}

		}

		//debug($recruiter);

		if ($recruiter->create()) {

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
