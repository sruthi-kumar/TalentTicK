<?php
require_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "job-details";
$page_data['page_title'] = "Job Details";

$id = $_GET['id'];

$job = new Job();

//$job->setData('user', $_SESSION['user_data']['user_id']);
$page_data['job_details'] = $job->getJobById($id);

//debug($page_data['job_details']);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('student-details.phtml');
$t->render('inc/footer.phtml');