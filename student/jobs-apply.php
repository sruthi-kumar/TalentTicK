<?php
require_once '../autoload.php';
validate_user('student');

$t = new TemplateEngine('student');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "job-list";
$page_data['page_title'] = "Job List";

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('jobs-applied.phtml');
$t->render('inc/footer.phtml');