<?php
require_once '../autoload.php';
validate_user('student');

$t = new TemplateEngine('student');
$t->data = [];

$page_data['page'] = "account-status";
$page_data['page_title'] = "Dashboard";

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('account-status.phtml');
$t->render('inc/footer.phtml');