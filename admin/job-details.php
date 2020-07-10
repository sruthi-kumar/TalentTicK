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

$branch = new Branch();

//debug($page_data['job_details']);

$qualified_branches = $page_data['job_details']['qualified_branches'];

$qualified_branches = json_decode($qualified_branches, true);

//debug($qualified_branches);

$branch_list = [];

foreach ($qualified_branches as $qualified_branch) {

	$branch_details = $branch->getBranchById($qualified_branch);

	//debug($branch_details);

	$branch_list[] = $branch_details['branch'];

}

//debug($branch_list);

$page_data['job_details']['branch_list'] = $branch_list;

//debug($page_data['job_details']);

$application = new JobApplication();

$page_data['application_count'] = $application->getJobApplicationByJob($page_data['job_details']['id'], 'count');

//debug($page_data['application_count']);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('job-details.phtml');
$t->render('inc/footer.phtml');