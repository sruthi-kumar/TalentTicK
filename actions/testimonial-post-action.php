<?php
include_once '../autoload.php';

validate_user('valid_user');

$status = 'success';

/*

`testimonials` WHERE 1  `id`, `user`, `user_type`, `description`, `status`, `show_in_web`, `created_at`, `updated_at`

 */

function validate_form($form_data) {

	$status = true;

	if (empty($form_data['description'])) {
		$status = false;
	}

	return $status;
}

//debug($_POST);

if (validate_form($_POST)) {

	$testimonial = new Testimonial();

	$login_details = get_current_user_set();

	//debug($login_details);

	$testimonial->setData('description', $_POST['description']);
	$testimonial->setData('user', $login_details['user_data']['user_id']);
	$testimonial->setData('user_type', $login_details['user_data']['type']);

	//debug($testimonial);

	if (isset($_POST['action']) && $_POST['action'] == "update") {

		$result = $testimonial->updateTestimonial($_POST['id']);

	} else {

		$result = $testimonial->createTestimonial();
	}

	//debug($result);

	if ($result) {

		$to_address = conf('admin_email');

		$subject = "Tetsimonial Posted/Updated By Member";

		$body = "Tetsimonial Posted/Updated By Member. \n  Please check and validate ";

		$notification = new Notification();

		$notification->setData('user', conf('admin_id'));
		$notification->setData('title', $subject);
		$notification->setData('description', $body);

		if ($notification->createNotification()) {

			//send_email_notification($to_address, $subject, $body);

		}

		$_SESSION['message']['testimonial'] = "Testimonial Post Successfull!";

	} else {
		$status = 'failed';
		$_SESSION['errors']['testimonial'] = "Testimonial Post Failed!";
	}

} else {
	$status = 'failed';
	$_SESSION['errors']['testimonial'] = "Invalid Testimonial Data!";
}

header("location:../" . $login_details['user_data']['type'] . "/testimonial.php?status=$status");