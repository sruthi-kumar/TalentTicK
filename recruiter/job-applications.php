<?php
include_once '../autoload.php';
validate_user('recruiter');

$t = new TemplateEngine('recruiter');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "job-applications";
$page_data['page_title'] = "Job Applications";

$application = new JobApplication();

$application->setData('user', $_SESSION['user_data']['user_id']);

$page_data['applications'] = $application->getJobApplications();

//debug($page_data['applications']);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('job-applications.phtml');
$t->render('inc/footer.phtml');