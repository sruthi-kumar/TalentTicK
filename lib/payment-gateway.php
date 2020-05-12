<?php

// Load Composer's autoloader
require __DIR__ . '/vendor/autoload.php';

use Razorpay\Api\Api;

/**
 *
 */
class PaymentGateway {

	private $api;

	function __construct() {

		$this->api = new Api('rzp_test_QQujy8RekXMXbQ', 'iImakcoCjZKIDbk9W2NT6G2l'); //enter your test key credentials here

	}

	public function createOrder($receipt, $amount) {

		$order = $this->api->order->create(array(
			'receipt' => $receipt,
			'amount' => $amount,
			'payment_capture' => 1,
			'currency' => 'INR',
		)
		);
		return $order;
	}

	public function getPaymentDetails($paymentid, $order_id, $signature) {
		$payment = $this->api->payment->fetch($paymentid); //post variable in index.php checkout.js
		$text = json_encode($payment->toArray());

		$attributes = array('razorpay_signature' => $signature, 'razorpay_payment_id' => $paymentid, 'razorpay_order_id' => $order_id);

		$order = $this->api->utility->verifyPaymentSignature($attributes);

		//debug($order);

		return $payment;
	}

}