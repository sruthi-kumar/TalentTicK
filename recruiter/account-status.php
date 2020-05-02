<?php
require_once '../autoload.php';

$t = new TemplateEngine('recruiter');
$t->data = [];

$page_data = get_current_user_set();
$page_data['assets'] = $admin_assets;

$page_data['page'] = "account-status";
$page_data['page_title'] = "Dashboard";

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('account-status.phtml');
$t->render('inc/footer.phtml');