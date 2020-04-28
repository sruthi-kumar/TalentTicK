<?php
require_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "student-list";
$page_data['page_title'] = "Student List";

$student = new Student();

$page_data['students'] = $student->getStudents();

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('student-list.phtml');
$t->render('inc/footer.phtml');