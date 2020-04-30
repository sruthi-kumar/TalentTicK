<?php
require_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "recruiter-list";
$page_data['page_title'] = "Recruiter List";

$recruiter = new Recruiter();

$page_data['recruiters'] = $recruiter->getRecruiters();

//debug($page_data['recruiters']);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('recruiter-list.phtml');
$t->render('inc/footer.phtml');