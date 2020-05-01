<?php
include_once 'autoload.php';

if (isset($_SESSION['user_data'])) {
	header('location:../' . $login_type . '/index.php');
}

$t = new TemplateEngine('web');
$t->data = [];

$page_data = get_current_user_set();
$page_data['assets'] = $web_assets;

$page_data['page_title'] = "Forgot Passowrd";

$page_data['forgot_password_status'] = $_GET['status'] ?? "";
$page_data['forgot_password_error'] = $_SESSION['errors']['forgot_password'] ?? null;

unset($_SESSION['errors']);

$t->data = $page_data;

$t->render('inc/header.phtml');
$t->render('forgot-password.phtml');
$t->render('inc/footer.phtml');