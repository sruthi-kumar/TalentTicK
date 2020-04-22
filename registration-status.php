<?php 
include_once ('autoload.php');
$t = new TemplateEngine('web'); 
$t->data = [] ; 


$page_data['login'] = $login_status;
$page_data['login_type'] = $login_type;
$page_data['assets'] = $web_assets;

$page_data['page_title'] = "Registration Success" ; 

$page_data['type']  = $_GET['type']; 
$page_data['status']  = $_GET['status']; 

$t->data= $page_data ; 
 
 
$t->render('inc/header.phtml');  
$t->render('register-status.phtml');  
$t->render('inc/footer.phtml');  