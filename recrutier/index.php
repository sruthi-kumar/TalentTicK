<?php
include_once ('../autoload.php');
$t = new TemplateEngine('company'); 
$t->data = [] ; 


$page_data['login'] = $login_status;
$page_data['login_type'] = $login_type;

$page_data['assets'] = $web_assets;

$page_data['page_title'] = "Dashboard" ; 

$page_data['total_jobs'] =  500 ; 
$page_data['total_members'] = 1563 ; 
$page_data['total_resumes'] = 250 ; 
$page_data['total_companies'] = 80 ; 

$testimonials = [ 1, 2, 3, 4, 5 ];

$page_data['testimonials'] = $testimonials  ; 


$t->data= $page_data ; 
$t->render('inc/header.phtml');  
$t->render('dashboard.phtml');  
$t->render('inc/footer.phtml');  