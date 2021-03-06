<?php
require_once '../autoload.php';
validate_user('recruiter');

$t = new TemplateEngine('recruiter');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "job-post";
$page_data['page_title'] = "Post Job";

//debug($page_data);

$location = new Location();
$job = new Job();
$branch = new Branch();

$page_data['states'] = $location->getStates();
$page_data['job_types'] = $job->getJobTypes();
$page_data['branches'] = $branch->getBranches();

//debug($page_data['states'], false);
//debug($page_data['districts']);
//debug($page_data['job_types']);
//debug($page_data['job_types']);

if (isset($_GET['id'])) {

	$page_data['job'] = $job->getJobById($_GET['id']);

	debug($page_data['job']);

	if ($page_data['job']['recruiter'] == $page_data['recruiter_id']) {

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