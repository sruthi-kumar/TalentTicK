<?php
include_once 'autoload.php';
$t = new TemplateEngine('web');

$t->data = [];

$page_data['login'] = $_SESSION['user_data']['type'] ?? false;
$page_data['login_type'] = $_SESSION['user_data']['type'] ?? "";
$page_data['assets'] = $web_assets;

$page_data['page_title'] = "Student Registration";
$page_data['registration_fees'] = config('registration_fees');
$page_data['payment_key'] = config('payment_key');
$page_data['currency'] = config('currency');

/*razorpay_payment_id, razorpay_order_id and razorpay_signature
 */

$page_data['receipt'] = "RECPT_00" . (rand(10, 100));

$payment_gateway = new PaymentGateway();
$order_details = $payment_gateway->createOrder($page_data['receipt'], $page_data['registration_fees']);

//debug($order_details);

$page_data['order_id'] = $order_details['id'];

$month_data = array(
	['month' => 1, 'month_display' => "JAN(01)"],
	['month' => 2, 'month_display' => "FEB(02)"],
	['month' => 3, 'month_display' => "MAR(03)"],
	['month' => 4, 'month_display' => "APR(04)"],
	['month' => 5, 'month_display' => "MAY(05)"],
	['month' => 6, 'month_display' => "JUN(06)"],
	['month' => 7, 'month_display' => "JUL(07)"],
	['month' => 8, 'month_display' => "AUG(08)"],
	['month' => 9, 'month_display' => "SEP(09)"],
	['month' => 10, 'month_display' => "OCT(10)"],
	['month' => 11, 'month_display' => "NOV(11)"],
	['month' => 12, 'month_display' => "DEC(12)"],
);

$page_data['months'] = $month_data;

$year_data = [];

for ($year = 20; $year < 99; $year++) {
	$year_data[] = ['year' => "20$year"];
}

$page_data['years'] = $year_data;

$t->data = $page_data;

$t->render('inc/header.phtml');
$t->render('register-student.phtml');
$t->render('inc/footer.phtml');