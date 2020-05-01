<?php
require_once '../autoload.php';
validate_user('recruiter');

$t = new TemplateEngine('recruiter');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "job-list";
$page_data['page_title'] = "Job List";

$job = new Job();
$page_data['jobs'] = $job->getJobs('list', $page_data['user_data']['recruiter_id']);

//debug($page_data['jobs']);

$t->data = $page_data;

$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('job-list.phtml');
$t->render('inc/footer.phtml');