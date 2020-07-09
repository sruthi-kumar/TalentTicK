<?php
require_once '../autoload.php';
validate_user('student');

$t = new TemplateEngine('student');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "profile-update";
$page_data['page_title'] = "Update Profile";

$student = new Student();

$location = new Location();
$job = new Job();
$branch = new Branch();

$page_data['states'] = $location->getStates();
$page_data['branches'] = $branch->getBranches();

$student_id = $page_data['user_data']['student_id'];

$page_data['profile_details'] = $student->getStudentById($student_id);

$page_data['districts'] = $location->getDistricts($page_data['profile_details']['state_id']);

$page_data['profile_update_error'] = $_SESSION['errors']['profile_update'] ?? null;

unset($_SESSION['errors']['profile_update']);

//debug($page_data['profile_details']);

//debug($page_data);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('profile-update.phtml');
$t->render('inc/footer.phtml');