<?php
require_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "job-details";
$page_data['page_title'] = "Job Details";

$student = new Student();

$page_data['profile_details'] = $student->getStudentById($_GET['id']);

//debug($page_data['job_details']);

$application = new JobApplication();

$page_data['application_count'] = $application->getJobApplications($_GET['id'], 'student', 'count');

$page_data['application_count'] = ($page_data['application_count'][0]) ?? ['count' => 0];

//debug($page_data['application_count']);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('student-details.phtml');
$t->render('inc/footer.phtml');