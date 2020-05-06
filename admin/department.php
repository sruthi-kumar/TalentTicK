<?php
require_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "department-details";
$page_data['page_title'] = "Department Details";

if (isset($_GET['status'])) {

	debug($_SESSION['errors']);

	if ($_GET['status'] == 'success') {
		$page_data['op_status'] = '<label style="color: green" > Post Successfull </label> ';
	}if ($_GET['status'] == 'failed') {
		$page_data['op_status'] = '<label style="color: red" >' . $_SESSION['errors']['department'] . '</label> ';
		unset($_SESSION['errors']['department']);
	}

}

$department = new Department();
if (isset($_GET['id'])) {

	$page_data['department_details'] = $department->getDepartmentById($_GET['id']);

//debug($page_data['department_details']);

}

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('department.phtml');
$t->render('inc/footer.phtml');