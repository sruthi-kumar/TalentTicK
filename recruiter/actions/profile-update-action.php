<?php
require_once '../../autoload.php';

//debug($_POST);

$status = 'success';

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

	return $status;
}

$login_details = get_current_user_set();

if (validate_form($_POST)) {

/*`recruiter_id`, `user_id`, `company_name`, `email`, `website`, `phone`, `address`, `license`, `city`, `pincode*/

	$recruiter = new Recruiter();
	$recruiter->setData('user_id', trim($_POST['user_id']));
	$recruiter->setData('company_name', trim($_POST['company_name']));
	$recruiter->setData('email', trim($_POST['email']));
	$recruiter->setData('website', trim($_POST['website']));
	$recruiter->setData('phone', trim($_POST['phone']));
	$recruiter->setData('address', trim($_POST['address']));
	$recruiter->setData('license', trim($_POST['license']));
	$recruiter->setData('city', trim($_POST['city']));
	$recruiter->setData('pincode', trim($_POST['pincode']));
	$recruiter->setData('status', trim($_POST['status']));

	//debug($recruiter);

	$result = $recruiter->update($login_details['user_data']['recruiter_id']);
	//debug($result);

	if (!$result) {
		$status = 'failed';
		$_SESSION['errors']['register'] = "Update Failed!";
	}

} else {
	$status = 'failed';
	$_SESSION['errors']['register'] = "Invalid Update Data!";
}

header("location:../profile-details.php?type=recruiter&status=$status");
