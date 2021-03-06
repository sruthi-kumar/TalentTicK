<?php
require_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "dashboard";
$page_data['page_title'] = "Dashboard";

$student = new Student();
$job = new Job();
$recruiter = new Recruiter();
$testimonial = new Testimonial();
$notification = new Notification();

$student_count = $student->getStudents('count');
$job_count = $job->getJobs('count');
$recruiter_count = $recruiter->getRecruiters('count');
$testimonial_count = $testimonial->getTestimonials('count');
$notification_count = $notification->getNotificationByUser($_SESSION['user_data']['user_id'], 'count');

$page_data['student_count'] = $student_count[0]['count'];
$page_data['job_count'] = $job_count[0]['count'];
$page_data['recruiter_count'] = $recruiter_count[0]['count'];
$page_data['testimonial_count'] = $testimonial_count[0]['count'];
$page_data['notification_count'] = $notification_count[0]['count'];

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('dashboard.phtml');
$t->render('inc/footer.phtml');