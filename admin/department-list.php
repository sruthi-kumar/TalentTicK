<?php
require_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "settings-departments";
$page_data['page_title'] = "Settings: Departments";

$department = new Department();

$page_data['departments'] = $department->getDepartments();

//debug($page_data['departments']);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('department-list.phtml');
$t->render('inc/footer.phtml');