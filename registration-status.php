<?php
include_once 'autoload.php';
if (isset($_SESSION['user_data'])) {
	header('location:../' . $login_type . '/index.php');
}
$t = new TemplateEngine('web');
$t->data = [];

$page_data['login'] = $_SESSION['user_data']['type'] ?? false;
$page_data['login_type'] = $_SESSION['user_data']['type'] ?? "";
$page_data['assets'] = $web_assets;

$page_data['page_title'] = "Registration Status";

$page_data['type'] = $_GET['type'];
$page_data['status'] = $_GET['status'];

$t->data = $page_data;

$t->render('inc/header.phtml');
$t->render('register-status.phtml');
$t->render('inc/footer.phtml');