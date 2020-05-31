<?php
require_once '../autoload.php';
validate_user('recruiter');

$t = new TemplateEngine('recruiter');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

if (isset($_GET['status']) && $_GET['status'] == 'success') {

	$page_data['page'] = "update-password";
	$page_data['page_title'] = "Update Password";

	$page_data['page'] = "validation-pending";
	$page_data['page_title'] = "Validation Pending";
	$t->data = $page_data;
	$t->render('inc/header.phtml');
	$t->render('password-updated.phtml');
	session_destroy();
	exit;
} else {

	$page_data['page'] = "update-password";
	$page_data['page_title'] = "Update Password";

	$t->data = $page_data;
	$t->render('inc/header.phtml');
	$t->render('inc/nav.phtml');
	$t->render('update-password.phtml');
	$t->render('inc/footer.phtml');
}