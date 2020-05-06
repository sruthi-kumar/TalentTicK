<?php
include_once '../autoload.php';
$result = [];

$t = new TemplateEngine('student');
$t->data = [];
$t->output = "get";

$email = urldecode($_GET['email']);

$user = new User();

$user->setData('username', $email);

$user_data = $user->getUserByUsername();

//debug($user_data);

if (!empty($user_data)) {

	$student = new Student();
	$student_data = $student->getStudentByUserId($user_data['id']);

	debug($student_data);

	$t->data = $page_data;
	$invoice_html = $t->render('inc/invoice.phtml');

	echo $invoice_html;

	//makePdf($invoice_html)
}