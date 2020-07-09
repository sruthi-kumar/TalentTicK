<?php
require_once '../../autoload.php';

validate_user('recruiter', true);

//debug($_POST);

$status = 'success';

/*
`jobs` WHERE 1 `id`, `recruiter`, `job_title`, `job_description`, `job_type`, `district_id`, `qualified_branches`, `CGPA_min`, `backlog_count`, `salary_min`, `salary_max`, `vacancies`, `status`, `last_date_to_apply`, `created_at`, `updated_at`

`job_types` WHERE 1 `id`, `job_type`, `status`
 */

function validate_form($form_data) {

	$status = true;

	if (empty($form_data['job_title'])) {
		$status = false;
	}

	if (empty($form_data['job_description'])) {
		$status = false;
	}

	if (empty($form_data['job_type'])) {
		$status = false;
	}

	if (empty($form_data['district_id'])) {
		$status = false;
	}

	if (empty($form_data['vacancies'])) {
		$status = false;
	}

	if (empty($form_data['qualified_branches'])) {
		$status = false;
	}

	return $status;
}

$login_details = get_current_user_set();

//debug($login_details['user_data']['recruiter_id']);

if (validate_form($_POST)) {

	//debug($_POST, false);

	$job = new Job();
	$job->setData('recruiter', $login_details['user_data']['recruiter_id']);
	$job->setData('job_title', $_POST['job_title']);
	$job->setData('job_description', $_POST['job_description']);
	$job->setData('district_id', $_POST['district_id']);
	$job->setData('qualified_branches', json_encode($_POST['qualified_branches']));
	$job->setData('last_date_to_apply', date("Y-m-d", strtotime($_POST['last_date_to_apply'])));
	$job->setData('backlog_count', $_POST['backlog_count']);
	$job->setData('CGPA_min', $_POST['CGPA_min']);
	$job->setData('salary_min', $_POST['salary_min']);
	$job->setData('salary_max', $_POST['salary_max']);
	$job->setData('vacancies', $_POST['vacancies']);

	debug($job);

	if ($job->create()) {

		notify_users();

	} else {
		$status = 'failed';
		$_SESSION['errors']['register'] = "Job Post Failed!";
	}
} else {
	$status = 'failed';
	$_SESSION['errors']['register'] = "Invalid Job Data!";
}

header("location:../job-list.php?status=$status");

function notify_users() {

	$users[] = [
		"user_id" => config('admin_id'),
		"email" => config('admin_email'),
	];

	$student = new Student();

	$students_list = $student->getStudents();

	//debug($students_list);

	debug($_POST['qualified_branches'], 0);

	foreach ($students_list as $student_details) {

		if (in_array($student_details['branch_id'], $_POST['qualified_branches'])) {

			if (
				floatval($_POST['CGPA_min']) >= floatval($student_details['cgpa']) &&
				intval($_POST['backlogs']) <= intval($student_details['backlogs'])
			) {
				$users[] = [
					"user_id" => $student_details['user_id'],
					"email" => $student_details['email'],
				];
			}

		}

	}

	debug($users);

	foreach ($users as $user) {

		$subject = "Job Posted By Recruiter";

		$body = "
		Job Posted By Recruiter.<br>

		Job Title : " . $_POST['job_title'] . "  <br>

		Job Description : " . $_POST['job_description'] . "  <br>

		Last Date to Apply : " . $_POST['last_date_to_apply'] . "  <br>

		Please check <br> ";

		$notification = new Notification();

		$notification->setData('user', $user['user_id']);
		$notification->setData('title', $subject);
		$notification->setData('description', $body);

		if ($notification->create()) {

			send_email_notification($user['email'], $subject, $body);

		}

	}
}