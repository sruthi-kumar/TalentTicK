<?php
include_once 'autoload.php';
$t = new TemplateEngine('web');
$t->data = [];

$page_data['login'] = $_SESSION['user_data']['type'] ?? false;
$page_data['login_type'] = $_SESSION['user_data']['type'] ?? "";
$page_data['assets'] = $web_assets;

$page_data['page_title'] = "Payment Gateway";

$t->data = $page_data;

$t->render('inc/header.phtml');
$t->render('payment-gateway.phtml');
$t->render('inc/footer.phtml');