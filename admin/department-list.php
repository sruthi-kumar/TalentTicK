<?php
include_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data['login'] = $login_status;
$page_data['login_type'] = $login_type;

$page_data['assets'] = $admin_assets;

$page_data['page'] = "settings-departments";
$page_data['page_title'] = "Settings: Departments";

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('department-list.phtml');
$t->render('inc/footer.phtml');