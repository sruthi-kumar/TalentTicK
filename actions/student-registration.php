<?php
require_once '../autoload.php';

//debug($_POST);

$status = 'success';

/*

array(11) {
["firstname"]=>
string(4) "John"
["lastname"]=>
string(3) "Doe"
["gender"]=>
string(4) "Male"
["email"]=>
string(17) "johndoe@gmail.com"
["mobile_number"]=>
string(10) "9847980829"
["password"]=>
string(12) "password@123"
["confirmpassword"]=>
string(12) "password@123"
["hidden"]=>
string(0) ""
["razorpay_payment_id"]=>
string(18) "pay_EpKirextRZfcCd"
["razorpay_order_id"]=>
string(20) "order_EpKdy1kBKQmc30"
["razorpay_signature"]=>
string(64) "5c0453320fbcb73ab6804c07bbe587379c599df4656d9345c08043a4d714e3a5"
}

 */

function validate_form($form_data) {

	$status = true;

	if (empty($form_data['firstname'])) {
		$status = false;
	}

	if (empty($form_data['lastname'])) {
		$status = false;
	}

	if (empty($form_data['gender']) || !in_array($form_data['gender'], ['Male', 'Female', 'Others'])) {
		$status = false;
	}

	if (empty($form_data['email'])) {
		$status = false;
	}

	return $status;
}

if (validate_form($_POST)) {

	$payment_status = 'panding';

	$payment_gateway = new PaymentGateway();

	$paymentid = $_POST['razorpay_payment_id'];
	$order_id = $_POST['razorpay_order_id'];
	$signature = $_POST['razorpay_signature'];

	$payment_details = $payment_gateway->getPaymentDetails($paymentid, $order_id, $signature);

	//debug($payment_details);

	$payment_method = $payment_details->method;
	$payment_id = $payment_details->id;
	$payment_date = date('Y-m-d', $payment_details->created_at);

	if ($payment_details->id = $paymentid) {

		$payment_status = 'paid';

		$user = new User();
		$user->setData('username', $_POST['email']);
		$user->setData('password', md5($_POST['password']));
		$user->setData('type', 'student');

		//debug($user);

		if ($user->create()) {

			$result = $user->getUserByUsername();

			//debug($result);

			$student = new Student();
			$student->setData('user_id', $result['id']);
			$student->setData('firstname', $_POST['firstname']);
			$student->setData('lastname', $_POST['lastname']);
			$student->setData('mobile_number', $_POST['mobile_number']);
			$student->setData('gender', $_POST['gender']);
			$student->setData('payment_status', $payment_status);
			$student->setData('payment_id', $payment_id);
			$student->setData('payment_method', $payment_method);
			$student->setData('payment_date', $payment_date);
			if ($student->create()) {

				$notification = new Notification();

				$notification->setData('user', config('admin_id'));
				$notification->setData('title', "New Student Registered");
				$notification->setData('description', "New Student Registerd in Portal.");

				if ($notification->create()) {

					$to_address = $_POST['email'];
					$subject = "TalenTick Job Portal Registration Successfull!";
					$body = "Hi " . $_POST['firstname'] . " " . $_POST['lastname'] . " , <br> Your Profile has been successfully registered wih our portal. <br>Please download the invoice of your payment here : <a target='_blank' href='" . base_url() . "/actions/download-invoice.php?email=" . urlencode(base64_encode($_POST['email'])) . "'> INVOICE <a>";

					send_email_notification($to_address, $subject, $body);

					$str = 'Some String';

				}

			} else {
				$status = 'failed';
				$_SESSION['errors']['register'] = "Registration Failed!";
			}

		} else {
			$status = 'failed';
			$_SESSION['errors']['register'] = "Registration Failed!";
		}
	} else {
		$_SESSION['errors']['register'] = "Payment Failed!";
	}
} else {
	$_SESSION['errors']['register'] = "Invalid Registration Data!";
}

header("location:../registration-status.php?type=student&status=$status");
