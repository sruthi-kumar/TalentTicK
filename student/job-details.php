<?php
require_once '../autoload.php';
validate_user('student');

$t = new TemplateEngine('student');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "job-details";
$page_data['page_title'] = "Job Details";

$id = $_GET['id'];

$job = new Job();

//$job->setData('user', $_SESSION['user_data']['user_id']);
$page_data['job_details'] = $job->getJobById($id);

$application = new JobApplication();

//debug($page_data['user_data']['user_id']);

$page_data['job_application_details'] = $application->getJobApplicationByIdStudent($id, $page_data['user_data']['user_id']);

//debug($page_data['job_application_details']);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('job-details.phtml');
$t->render('inc/footer.phtml');