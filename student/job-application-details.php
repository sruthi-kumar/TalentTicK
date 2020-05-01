<?php
require_once '../autoload.php';
validate_user('student');

$t = new TemplateEngine('student');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "job-application-details";
$page_data['page_title'] = "Job Application Details";

$application = new JobApplication();

$application->setData('user', $_SESSION['user_data']['user_id']);

$id = $_GET['id'];

$page_data['application_details'] = $application->getJobApplicationById($id);

//debug($page_data['application_details']);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('job-application-details.phtml');
$t->render('inc/footer.phtml');