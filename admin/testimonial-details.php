<?php
require_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "testimonial-details";
$page_data['page_title'] = "Testimonial Details";

$testimonial_id = $_GET['id'];
$testimonial = new Testimonial();
$page_data['testimonial_details'] = $testimonial->getTestimonialById($testimonial_id);
//debug($page_data['testimonial_details']);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('testimonial-details.phtml');
$t->render('inc/footer.phtml');