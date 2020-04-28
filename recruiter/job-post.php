<?php
require_once '../autoload.php';
validate_user('recruiter');

$t = new TemplateEngine('recruiter');
$t->data = [];

$current_user = get_current_user_set();

$page_data['user_data'] = $current_user;

$page_data['assets'] = $admin_assets;

$page_data['page'] = "job-list";
$page_data['page_title'] = "Job List";

//debug($page_data);

$location = new Location();
$job = new Job();

$page_data['states'] = $location->getStates();
$page_data['job_types'] = $job->getJobTypes();

//debug($page_data['states'], false);
//debug($page_data['districts']);
//debug($page_data['job_types']);

if (isset($_GET['id'])) {

	$page_data['job'] = $job->getJobById($_GET['id']);

	debug($page_data['job']);

	if ($page_data['job']['recruiter'] == $current_user['recruiter_id']) {

	}

}

//debug($page_data['job']);

//debug($_SESSION);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('job-post.phtml');
$t->render('inc/footer.phtml');