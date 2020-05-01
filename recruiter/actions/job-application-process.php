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

	$job_appication->update($_GET['id']);
}

header("location:../job-applications.php?status=$status");