<?php
require_once '../../autoload.php';

validate_user('admin');

$status = 'success';

/*

`bluckmessages` WHERE 1  `id`, `user`, `user_type`, `message`, `status`, `show_in_web`, `created_at`, `updated_at`

 */

function validate_form($form_data) {

	$status = true;

	if (empty($form_data['message'])) {
		$status = false;
	}

	return $status;
}

//debug($_SERVER['HTTP_REFERER']);

//debug($_POST);

if (validate_form($_POST)) {

	$sendergroup = $_POST['sendergroup'];
	$message = $_POST['message'];

	//debug($message);

	if ($sendergroup == 'recruiters') {

		$recruiter = new Recruiter();
		$recpients = $recruiter->getRecruiters('list', 'approved');

	}
	if ($sendergroup == 'students') {
		$student = new Student();

		$recpients = $student->getStudents();
	}

	//debug($recpients);

	if ($recpients) {

		foreach ($recpients as $recpient) {

			$subject = "Message From Talentick Admin";

			$notification = new Notification();

			$notification->setData('user', $recpient["user_id"]);
			$notification->setData('title', $subject);
			$notification->setData('description', $message);

			debug($notification);

			if ($notification->create()) {

				send_email_notification($recpient["email"], $subject, $message);

			}

		}

		$_SESSION['bluckmessage']['message'] = "Bluck Message Successfull!";

	} else {
		$status = 'failed';
		$_SESSION['errors']['bluckmessage'] = "Bluck Message Failed!";
	}

} else {
	$status = 'failed';
	$_SESSION['errors']['bluckmessage'] = "Invalid Testimonial Data!";
}

header("location:" . $_SERVER['HTTP_REFERER'] . "?status=$status");