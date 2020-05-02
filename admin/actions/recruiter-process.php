<?php
require_once '../../autoload.php';

validate_user('recruiter');

$status = 'success';

$recruiter_id = $_GET['id'];
$recruiter = new Recruiter();

if (isset($_GET['id']) && isset($_GET['action'])) {

	$recruiter_details = $recruiter->getRecruiterById($recruiter_id);

	//debug($recruiter_details);

	$recruiter->setData('user_id', $login_details['user_data']['user_id']);
	$recruiter->setData('company_name', $recruiter_details['company_name']);
	$recruiter->setData('email', $recruiter_details['email']);
	$recruiter->setData('website', $recruiter_details['website']);
	$recruiter->setData('phone', $recruiter_details['phone']);
	$recruiter->setData('address', $recruiter_details['address']);
	$recruiter->setData('license', $recruiter_details['license']);
	$recruiter->setData('city', $recruiter_details['city']);
	$recruiter->setData('pincode', $recruiter_details['pincode']);
	$recruiter->setData('image', $image_file);
	$recruiter->setData('status', $_GET['action']);

	$result = $recruiter->update($recruiter_id);
	//debug($result);

	if (!$result) {
		$status = 'failed';
		$_SESSION['errors']['register'] = "Update Failed!";
	} else {

		$_SESSION['user_data']['image'] = $image_file;

	}

} else {
	$status = 'failed';
	$_SESSION['errors']['register'] = "Invalid Update Data!";
}

header("location:../profile-details.php?type=recruiter&status=$status");
