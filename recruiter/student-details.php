<?php
require_once '../autoload.php';
validate_user('recruiter');

$t = new TemplateEngine('recruiter');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "student-details";
$page_data['page_title'] = "Student Details";

$student = new Student();

$page_data['profile_details'] = $student->getStudentById($_GET['id']);

//debug($page_data['job_details']);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('student-details.phtml');
$t->render('inc/footer.phtml');