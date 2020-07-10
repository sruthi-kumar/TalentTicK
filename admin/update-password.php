<?php
require_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "update-password";
$page_data['page_title'] = "Update Password";

if (isset($_GET['status']) && $_GET['status'] == 'success') {

	$t->data = $page_data;
	$t->render('inc/header.phtml');
	$t->render('password-updated.phtml');
	session_destroy();
	exit;
} else {

	$t->data = $page_data;
	$t->render('inc/header.phtml');
	$t->render('inc/nav.phtml');
	$t->render('update-password.phtml');
	$t->render('inc/footer.phtml');
}