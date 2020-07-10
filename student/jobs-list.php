<?php
require_once '../autoload.php';
validate_user('student');

$t = new TemplateEngine('student');
$t->data = [];

$page_data = get_current_user_set();

//debug($page_data);

$page_data['assets'] = $admin_assets;

$page_data['page'] = "job-list";
$page_data['page_title'] = "Job List";

$page_data['jobs'] = [];

$job = new Job();

//$job->setData('user', $_SESSION['user_data']['user_id']);
$job_list = $job->getJobs();

$student = new Student();

//debug($page_data['user_data']['student_id']);

$student_details = $student->getStudentById($page_data['user_data']['student_id']);
//debug($student_details);

foreach ($job_list as $job) {

	//debug($job);

	$qualified_branches = json_decode($job['qualified_branches'], true);

	//debug($qualified_branches);

	if (in_array($student_details['branch_id'], $qualified_branches)) {

		if (
			floatval($job['CGPA_min']) >= floatval($student_details['cgpa']) &&
			intval($job['backlog_count']) <= intval($student_details['backlogs'])
		) {
			$page_data['jobs'][] = $job;
		}

	}

}

//debug($page_data['jobs']);

$t->data = $page_data;

$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('job-list.phtml');
$t->render('inc/footer.phtml');