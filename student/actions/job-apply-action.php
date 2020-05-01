<?php
require_once '../../autoload.php';

validate_user('student');

$status = 'success';

$login_details = get_current_user_set();

$job_application = new JobApplication();

if (isset($_GET['id'])) {

	/*`job_applications` WHERE  `id`, `user`, `job`, `status`, `created_at`, `updated_at`*/

	$job_application->setData('user', $login_details['user_data']['user_id']);
	$job_application->setData('job', $_GET['id']);

	//debug($job_application);

	$result = $job_application->create();

	//debug($result);

	if (!$result) {
		$status = 'failed';
		$_SESSION['errors']['apply_job'] = "Job Application Failed!";
	}

} else {
	$status = 'failed';
	$_SESSION['errors']['apply_job'] = "Invalid Data!";
}

header("location:../job-details.php?id=" . $_GET['id'] . "&status=$status");
