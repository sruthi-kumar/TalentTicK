<?php
require_once '../autoload.php';
validate_user('student');

$t = new TemplateEngine('student');
$t->data = [];

//debug($_SESSION['user_data']);

$page_data = get_current_user_set();

$page_data['assets'] = $admin_assets;

$page_data['page'] = "notifications";
$page_data['page_title'] = "Notifications";

$notification = new Notification();

$notification->setData('user', $_SESSION['user_data']['user_id']);

$page_data['notifications'] = $notification->getNotificationByUser();

//debug($page_data['notifications']);

$t->data = $page_data;
$t->render('inc/header.phtml');
$t->render('inc/nav.phtml');
$t->render('notifications.phtml');
$t->render('inc/footer.phtml');