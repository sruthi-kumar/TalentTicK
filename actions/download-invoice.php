<?php
include_once '../autoload.php';
$result = [];

$t = new TemplateEngine('student', "get-html");
$t->data = [];

$email = base64_decode(urldecode($_GET['invoice_id']));

$user = new User();

$user->setData('username', $email);

$user_data = $user->getUserByUsername();

//debug($user_data);

if (!empty($user_data)) {

	$student = new Student();
	$student_data = $student->getStudentByUserId($user_data['id']);

	//debug($student_data);

	$page_data['title'] = "Invoice";
	$page_data['student_data'] = $student_data;
	$page_data['invoice_details'] = ['amount' => 500];

	//debug($page_data['student_data']);

	$t->data = $page_data;
	$invoice_html = $t->render('invoice.phtml');

	//echo $invoice_html;

	makePdf($invoice_html);
}