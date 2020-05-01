<?php
require_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "branch-post";
$page_data['page_title'] = "Branch";

if (isset($_GET['status'])) {

	if ($_GET['status'] == 'success') {
		$page_data['op_status'] = '<label style="color: green" > Post Successfull </label> ';
	}if ($_GET['status'] == 'failed') {
		$page_data['op_status'] = '<label style="color: red" >Post Failed</label> ';
	}

}

$department = new Department();
$page_data['departments'] = $department->getDepartments();

$branch = new Branch();

if (isset($_GET['id'])) {

	$page_data['branch_details'] = $branch->getBranchById($_GET['id']);

//debug($page_data['branch_details']);

}

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('branch.phtml');
$t->render('inc/footer.phtml');