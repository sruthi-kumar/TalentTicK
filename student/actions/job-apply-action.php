<?php
require_once '../../autoload.php';

validate_user('student', true);

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
	} else {

		$job = new Job();
		$job_details = $job->getJobById($_GET['id']);

		//debug($job_details);

		$recruiter = new Recruiter();
		$recruiter_details = $recruiter->getRecruiterById($job_details['recruiter']);

		//debug($recruiter_details);

		$subject = "Job Applied By Candidate";

		$body = "
		Job Applied By Candidate.<br>
		Please check <br> ";

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
	$_SESSION['errors']['apply_job'] = "Invalid Data!";
}

header("location:../job-details.php?id=" . $_GET['id'] . "&status=$status");
