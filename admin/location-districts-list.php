<?php
require_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "settings-departments";
$page_data['page_title'] = "Settings: Departments";

$location = new Location();

$page_data['districts'] = $location->getDistricts();

//debug($page_data['districts']);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('location-districts-list.phtml');
$t->render('inc/footer.phtml');