<?php
include_once ('../autoload.php');

validate_user('recruiter');

$t = new TemplateEngine('recruiter'); 
$t->data = [] ; 

$page_data['login'] = $login_status;
$page_data['login_type'] = $login_type;
$page_data['assets'] = $web_assets;
 
$page_data['assets'] = $admin_assets;

$page_data['page_title'] = "Dashboard" ;   

//print_r($page_data); exit ; 

$t->data= $page_data ; 
$t->render('inc/header.phtml');  
$t->render('dashboard.phtml');  
$t->render('inc/footer.phtml');  