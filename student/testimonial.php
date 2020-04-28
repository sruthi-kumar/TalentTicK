<?php
include_once '../autoload.php';
validate_user('student');

$t = new TemplateEngine('student');
$t->data = [];
$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "testimonial";
$page_data['page_title'] = "Testimonial";

$testimonial = new Testimonial();

$login_details = get_current_user_set();
$user_id = $login_details['user_data']['user_id'];

$page_data['testimonial'] = $testimonial->getTestimonialByUser($user_id);

if (isset($_GET['status']) && !empty($_GET['status'])) {
	$page_data['status'] = $_GET['status'];
}

//debug($page_data['testimonial']);

//debug($_SESSION);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('testimonial-post.phtml');
$t->render('inc/footer.phtml');