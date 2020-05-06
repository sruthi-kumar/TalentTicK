<?php
require_once '../../autoload.php';

validate_user('student');

debug($_POST, false);
debug($_FILES);

$status = 'success';

function validate_form($form_data) {

	$status = true;

	if (empty($form_data['company_name'])) {
		$status = false;
	}

	if (empty($form_data['phone'])) {
		$status = false;
	}

	if (empty($form_data['address'])) {
		$status = false;
	}

	if (empty($form_data['license'])) {
		$status = false;
	}

	if (empty($form_data['city'])) {
		$status = false;
	}

	if (empty($form_data['pincode'])) {
		$status = false;
	}

	return $status;
}

$login_details = get_current_user_set();

if (validate_form($_POST)) {

	$student = new Student();

	$image_file = $login_details['user_data']['image'];

	if (isset($_FILES) && !empty($_FILES['image'])) {

		/*echo ($_FILES["image"]["name"]);
			echo "<br>";
			echo ($_FILES["image"]["tmp_name"]);
		*/

		$target_dir = "../../uploads/images/";

		$imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

		$enc_name = base64_encode($_FILES["image"]["name"] . $login_details['user_data']['user_id']) . "." . $imageFileType;
		$target_file = $target_dir . $enc_name;

		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

			$image_file = $enc_name;
			echo ("File Uploaded");

		} else {
			echo ("File Upload Failed");
		}

	}

	$student->setData('user_id', $login_details['user_data']['user_id']);
	$student->setData('company_name', trim($_POST['company_name']));
	$student->setData('email', trim($_POST['email']));
	$student->setData('website', trim($_POST['website']));
	$student->setData('phone', trim($_POST['phone']));
	$student->setData('address', trim($_POST['address']));
	$student->setData('license', trim($_POST['license']));
	$student->setData('city', trim($_POST['city']));
	$student->setData('pincode', trim($_POST['pincode']));
	$student->setData('image', $image_file);
	$student->setData('status', trim($_POST['status']));

	//debug($student);

	$result = $student->update($login_details['user_data']['student_id']);
	//debug($result);

	if (!$result) {
		$status = 'failed';
		$_SESSION['errors']['register'] = "Update Failed!";
	} else {

		$_SESSION['user_data']['image'] = $image_file;

	}

} else {
	$status = 'failed';
	$_SESSION['errors']['register'] = "Invalid Update Data!";
}

header("location:../profile-details.php?type=student&status=$status");
