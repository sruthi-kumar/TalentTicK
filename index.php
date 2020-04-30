<?php
include_once 'autoload.php';
$t = new TemplateEngine('web');
$t->data = [];

$page_data['login'] = $_SESSION['user_data']['type'] ?? false;
$page_data['login_type'] = $_SESSION['user_data']['type'] ?? "";

$page_data['assets'] = $web_assets;

$page_data['page_title'] = "Home";

$job = new Job();
$user = new User();
$student = new Student();
$recruiter = new Recruiter();
$testimonial = new Testimonial();

$page_data['total_jobs'] = $job->getJobs('count');
$page_data['total_members'] = $user->getUsers('count');
$page_data['total_resumes'] = $student->getStudents('count');
$page_data['total_companies'] = $recruiter->getRecruiters('count');

$page_data['testimonials'] = $testimonial->getTopTestimonials();

//debug($page_data);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('home.phtml');
$t->render('inc/footer.phtml');