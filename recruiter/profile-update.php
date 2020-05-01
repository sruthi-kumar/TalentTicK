<?php
require_once '../autoload.php';
validate_user('recruiter');

$t = new TemplateEngine('recruiter');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "profile-update";
$page_data['page_title'] = "Update Profile";

$recruiter = new Recruiter();

$recruiter_id = $page_data['user_data']['recruiter_id'];

$profile_details = $recruiter->getRecruiterById($recruiter_id);

//debug($profile_details);

$page_data['profile_details'] = $profile_details;

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('profile-update.phtml');
$t->render('inc/footer.phtml');