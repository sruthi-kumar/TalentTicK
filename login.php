<?php
include_once 'autoload.php';

if (isset($_SESSION['user_data'])) {
	header('location:../' . $login_type . '/index.php');
}

$t = new TemplateEngine('web');
$t->data = [];

$page_data = get_current_user_set();
$page_data['assets'] = $web_assets;

$page_data['page_title'] = "Login";

$page_data['login_status'] = $_GET['status'] ?? "";
$page_data['login_error'] = $_SESSION['errors']['auth'] ?? null;

$t->data = $page_data;

$t->render('inc/header.phtml');
$t->render('login.phtml');
$t->render('inc/footer.phtml');