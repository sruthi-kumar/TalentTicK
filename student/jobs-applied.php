<?php
require_once '../autoload.php';
validate_user('student');

$t = new TemplateEngine('student');
$t->data = [];

$page_data = get_current_user_set();
//debug($page_data);

$page_data['assets'] = $admin_assets;

$page_data['page'] = "jobs-applied";
$page_data['page_title'] = "Applied Job List";

$application = new JobApplication();

$application->setData('user', $_SESSION['user_data']['user_id']);

$page_data['applications'] = $application->getJobApplications($page_data['user_data']['student_id'], $page_data['login_type']);

//debug($page_data['applications']);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('jobs-applied.phtml');
$t->render('inc/footer.phtml');