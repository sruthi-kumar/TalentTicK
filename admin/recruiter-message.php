<?php
require_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "recruiter-list";
$page_data['page_title'] = "Bluck Message to Recruiters";

$page_data['sendergroup'] = "recruiters";
if (isset($_GET['status'])) {

	if ($_GET['status'] == 'success') {
		$page_data['op_status'] = '<label style="color: green" > Post Successfull </label> ';
	}if ($_GET['status'] == 'failed') {
		$page_data['op_status'] = '<label style="color: red" >Post Failed</label> ';
	}

}
$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('bulk-message.phtml');
$t->render('inc/footer.phtml');