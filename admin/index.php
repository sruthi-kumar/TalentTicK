<?php
include_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data['login'] = $_SESSION['user_data']['type'] ?? false;
$page_data['login_type'] = $_SESSION['user_data']['type'] ?? "";
$page_data['user_data'] = $_SESSION['user_data'] ?? [];

$page_data['assets'] = $admin_assets;

$page_data['page'] = "dashboard";
$page_data['page_title'] = "Dashboard";

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('dashboard.phtml');
$t->render('inc/footer.phtml');