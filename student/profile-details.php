<?php
require_once '../autoload.php';
validate_user('student');

$t = new TemplateEngine('student');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "profile-details";
$page_data['page_title'] = "Job List";

$student = new Student();

$student_id = $page_data['user_data']['student_id'];

$page_data['profile_details'] = $student->getStudentById($student_id);

//debug($page_data['profile_details']);

$page_data['op_status'] = $_SESSION['errors']['profile_update'] ?? null;
unset($_SESSION['errors']['profile_update']);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('student-details.phtml');
$t->render('inc/footer.phtml');