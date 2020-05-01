<?php
require_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "recruiter-list";
$page_data['page_title'] = "Recruiter List";

$recruiter = new Recruiter();

if (isset($_GET['type']) && $_GET['type'] == "pending") {
	$page_data['recruiters'] = $recruiter->getRecruiters('list', 'pending');

} else {
	$page_data['recruiters'] = $recruiter->getRecruiters('list', 'approved');
}

//debug($page_data['recruiters']);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('recruiter-list.phtml');
$t->render('inc/footer.phtml');