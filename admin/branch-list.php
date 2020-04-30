<?php
require_once '../autoload.php';
validate_user('admin');

$t = new TemplateEngine('admin');
$t->data = [];

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "branch-list";
$page_data['page_title'] = "Settings: Branches";

$branch = new Branch();

$page_data['branches'] = $branch->getBranches();

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('branch-list.phtml');
$t->render('inc/footer.phtml');