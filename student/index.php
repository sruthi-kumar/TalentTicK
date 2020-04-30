<?php
require_once '../autoload.php';
validate_user('student');

$t = new TemplateEngine('student');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "dashboard";
$page_data['page_title'] = "Dashboard";

$page_data['job_count'] = "100";
$page_data['recruiter_count'] = "100";
$page_data['testimonial_count'] = "100";
$page_data['notification_count'] = "100";

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('dashboard.phtml');
$t->render('inc/footer.phtml');