<?php
include_once ('autoload.php');
$t = new TemplateEngine($_SERVER['DOCUMENT_ROOT'].'/templates/web/'); 
$t->data = [] ; 


$page_data['login'] = $login_status;
$page_data['login_type'] = $login_type;
$page_data['assets'] = $web_assets;

$page_data['page_title'] = "Home" ; 

$t->data= $page_data ; 
 
 
$t->render('inc/header.phtml');  
$t->render('register-student.phtml');  
$t->render('inc/footer.phtml');  