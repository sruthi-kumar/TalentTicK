<?php
require_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data = get_current_user_set();

//debug($page_data);

$page_data['assets'] = $admin_assets;

$page_data['page'] = "job-list";
$page_data['page_title'] = "Job List";

$job = new Job();

//$job->setData('user', $_SESSION['user_data']['user_id']);
$page_data['jobs'] = $job->getJobs();

//debug($page_data['jobs']);

$t->data = $page_data;

$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('job-list.phtml');
$t->render('inc/footer.phtml');