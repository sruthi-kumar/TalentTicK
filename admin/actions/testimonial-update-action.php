<?php
require_once '../../autoload.php';

validate_user('admin');

$status = 'success';

$login_details = get_current_user_set();

$testimonial = new Testimonial();

if (isset($_GET['id'])) {

	/*array(8) {
		  ["id"]=>
		  string(1) "1"
		  ["user"]=>
		  string(1) "2"
		  ["user_type"]=>
		  string(7) "student"
		  ["description"]=>
		  string(16) "Testing testing "
		  ["status"]=>
		  string(7) "pending"
		  ["show_in_web"]=>
		  string(2) "no"
		  ["created_at"]=>
		  string(19) "2020-05-06 01:27:30"
		  ["updated_at"]=>
		  string(19) "2020-05-06 01:27:30"
		}
	*/

	$testimonial_details = $testimonial->getTestimonialById($_GET['id']);

	//debug($testimonial_details);

	$testimonial->setData('user', $testimonial_details['user']);
	$testimonial->setData('user_type', $testimonial_details['user_type']);
	$testimonial->setData('description', $testimonial_details['description']);
	$testimonial->setData('user', $testimonial_details['user']);
	$testimonial->setData('user', $testimonial_details['user']);
	$testimonial->setData('status', $_GET['action']);

	//debug($testimonial);

	$result = $testimonial->update($_GET['id']);

	//debug($result);

	if (!$result) {
		$status = 'failed';
		$_SESSION['errors']['testimonial_update'] = "Testimonial Update Failed!";
	} else {

		//notify recruiter

	}

} else {
	$status = 'failed';
	$_SESSION['errors']['testimonial_update'] = "Invalid Data!";
}

header("location:../testimonial-details.php?id=" . $_GET['id'] . "&status=$status");
