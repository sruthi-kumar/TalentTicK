<?php
require_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

//debug($_SESSION['user_data']);

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "testimonials";
$page_data['page_title'] = "Testimonials";

$testimonial = new Testimonial();

$page_data['testimonials'] = $testimonial->getTestimonials();

//debug($page_data['testimonials']);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('testimonials.phtml');
$t->render('inc/footer.phtml');