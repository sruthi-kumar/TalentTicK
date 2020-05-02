<?php
require_once '../../autoload.php';

validate_user('recruiter');

$status = 'success';

$job_appication = new JobApplication();

if (isset($_GET['id']) && isset($_GET['action'])) {

	$job_appication_details = $job_appication->getJobApplicationById($_GET['id']);

	//debug($job_appication_details);

	$job_appication->setData('job', $job_appication_details['job']);
	$job_appication->setData('user', $job_appication_details['user']);
	$job_appication->setData('status', $_GET['action']);

	if ($job_appication->update($_GET['id'])) {

		$user = new User();

		$user_details = $user->getUserById($job_appication_details['user']);
		//debug($user_details);

		$subject = "Your Application has been accepted by Recruiter";

		$body = " Dear Student .<br>  Your Application has been accepted by Recruiter <br> Please check your account <br> ";

		$notification = new Notification();

		$notification->setData('user', $user_details['id']);
		$notification->setData('title', $subject);
		$notification->setData('description', $body);

		if ($notification->create()) {

			send_email_notification($user_details['email'], $subject, $body);

		}
	}
}

header("location:../job-applications.php?status=$status");