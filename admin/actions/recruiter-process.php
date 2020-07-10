<?php
require_once '../../autoload.php';

validate_user('admin');

$status = 'success';

$recruiter_id = $_GET['id'];
$recruiter = new Recruiter();

if (isset($_GET['id']) && isset($_GET['action'])) {

	$recruiter_details = $recruiter->getRecruiterById($recruiter_id);

	//debug($recruiter_details);

	$recruiter->setData('user_id', $recruiter_details['user_id']);
	$recruiter->setData('company_name', $recruiter_details['company_name']);
	$recruiter->setData('email', $recruiter_details['email']);
	$recruiter->setData('website', $recruiter_details['website']);
	$recruiter->setData('phone', $recruiter_details['phone']);
	$recruiter->setData('address', $recruiter_details['address']);
	$recruiter->setData('license', $recruiter_details['license']);
	$recruiter->setData('city', $recruiter_details['city']);
	$recruiter->setData('pincode', $recruiter_details['pincode']);
	$recruiter->setData('image', $recruiter_details['image']);
	$recruiter->setData('license_file', $recruiter_details['license_file']);
	$recruiter->setData('status', $_GET['action']);

	//debug($recruiter);

	$result = $recruiter->update($recruiter_id);
//	debug($result);

	if (!$result) {
		$status = 'failed';
		$_SESSION['errors']['register'] = "Update Failed!";
	} else {

		$subject = "Your Profile has been approved by Talentick Admin";

		$body = "
		Dear " . $recruiter_details['company_name'] . "<br>
		Your Profile has been approved by Talentick Admin <br> ";

		$notification = new Notification();

		$notification->setData('user', $recruiter_details['user_id']);
		$notification->setData('title', $subject);
		$notification->setData('description', $body);

		if ($notification->create()) {

			send_email_notification($user['email'], $subject, $body);

		}

	}

} else {
	$status = 'failed';
	$_SESSION['errors']['register'] = "Invalid Update Data!";
}

header("location:../recruiter-details.php?id=" . $_GET['id'] . "&status=$status");
