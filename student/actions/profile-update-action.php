<?php
require_once '../../autoload.php';

validate_user('student', true);

//debug($_POST, false);
//debug($_FILES);

$status = 'success';

function validate_form($form_data) {

	$status = true;

	$required_feilds = [
		'firstname',
		'lastname',
		'gender',
		'dob',
		'email',
		'mobile_number',
		'state_id',
		'district_id',
		'address',
		'addressline2',
		'pincode',
		'branch_id',
		'cgpa',
		'gug',
		'gplus',
		'g10',
		'backlogs',
		'user_id',
		'payment_status',
	];

	foreach ($required_feilds as $required_feild) {

		if (empty($form_data[$required_feild])) {
			$status = false;
		}
	}

	return $status;
}

$login_details = get_current_user_set();

if (validate_form($_POST)) {

	$student = new Student();
	$profile = new Profile();

	$image = $login_details['user_data']['image'];

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

			$image = $enc_name;
			echo ("<br> File Uploaded");

		} else {
			echo ("<br> File Upload Failed");
		}

	}

	if (isset($_FILES) && !empty($_FILES['resume'])) {

		/*echo ($_FILES["resume"]["name"]);
			echo "<br>";
			echo ($_FILES["resume"]["tmp_name"]);
		*/

		$target_dir = "../../uploads/resumes/";

		$imageFileType = strtolower(pathinfo($_FILES["resume"]["name"], PATHINFO_EXTENSION));

		$enc_name = base64_encode($_FILES["resume"]["name"] . $login_details['user_data']['user_id']) . "." . $imageFileType;
		$target_file = $target_dir . $enc_name;

		if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {

			$resume = $enc_name;
			echo ("<br> Resume File Uploaded");
			$profile->setData('resume', $resume);

		} else {
			echo ("<br> Resume File Upload Failed");
		}

	}

	if (isset($_FILES) && !empty($_FILES['sslc_certificate'])) {

		/*echo ($_FILES["sslc_certificate"]["name"]);
			echo "<br>";
			echo ($_FILES["sslc_certificate"]["tmp_name"]);
		*/

		$target_dir = "../../uploads/certificates/";

		$imageFileType = strtolower(pathinfo($_FILES["sslc_certificate"]["name"], PATHINFO_EXTENSION));

		$enc_name = base64_encode("SSLC_" . $_FILES["sslc_certificate"]["name"] . $login_details['user_data']['user_id']) . "." . $imageFileType;
		$target_file = $target_dir . $enc_name;

		if (move_uploaded_file($_FILES["sslc_certificate"]["tmp_name"], $target_file)) {

			$sslc_certificate = $enc_name;
			echo ("<br> sslc_certificate File Uploaded");

			$profile->setData('sslc_certificate', $sslc_certificate);

		} else {
			echo ("<br> sslc_certificate File Upload Failed");
		}

	}

	if (isset($_FILES) && !empty($_FILES['highersecondary_certificate'])) {

		/*echo ($_FILES["image"]["name"]);
			echo "<br>";
			echo ($_FILES["image"]["tmp_name"]);
		*/

		$target_dir = "../../uploads/certificates/";

		$imageFileType = strtolower(pathinfo($_FILES["highersecondary_certificate"]["name"], PATHINFO_EXTENSION));

		$enc_name = base64_encode($_FILES["highersecondary_certificate"]["name"] . $login_details['user_data']['user_id']) . "." . $imageFileType;
		$target_file = $target_dir . $enc_name;

		if (move_uploaded_file($_FILES["highersecondary_certificate"]["tmp_name"], $target_file)) {

			$highersecondary_certificate = $enc_name;
			echo ("<br> highersecondary_certificate File Uploaded");
			$profile->setData('highersecondary_certificate', $highersecondary_certificate);

		} else {
			echo ("<br> highersecondary_certificate File Upload Failed");
		}

	}

	$student->setData('user_id', $login_details['user_data']['user_id']);
	$student->setData('firstname', trim($_POST['firstname']));
	$student->setData('lastname', trim($_POST['lastname']));
	$student->setData('gender', trim($_POST['gender']));
	$student->setData('mobile_number', trim($_POST['mobile_number']));
	$student->setData('image', $image);
	$student->setData('payment_status', trim($_POST['payment_status']));
	$student->setData('branch_id', trim($_POST['branch_id']));
	$student->setData('payment_id', trim($_POST['payment_id']));
	$student->setData('payment_method', trim($_POST['payment_method']));
	$student->setData('payment_date', trim($_POST['payment_date']));

	//debug($student);

	$profile->setData('student_id', $login_details['user_data']['student_id']);
	$profile->setData('dob', trim($_POST['dob']));
	$profile->setData('state_id', trim($_POST['state_id']));
	$profile->setData('district_id', trim($_POST['district_id']));
	$profile->setData('address', trim($_POST['address']));
	$profile->setData('addressline2', trim($_POST['addressline2']));
	$profile->setData('pincode', trim($_POST['pincode']));
	$profile->setData('cgpa', trim($_POST['cgpa']));
	$profile->setData('gpg', trim($_POST['gpg']));
	$profile->setData('gug', trim($_POST['gug']));
	$profile->setData('gplus', trim($_POST['gplus']));
	$profile->setData('g10', trim($_POST['g10']));
	$profile->setData('backlogs', trim($_POST['backlogs']));

	//debug($profile);

	$result = $student->update($login_details['user_data']['student_id']);

	//debug($result);

	if (!$result) {
		$status = 'failed';
		$_SESSION['errors']['register'] = "Update Failed!";
	} else {

		$_SESSION['user_data']['image'] = $image;

		$profile_details = $profile->getProfileByStudentId($login_details['user_data']['student_id']);

		//debug($profile_details);

		if (!empty($profile_details)) {

			$result = $profile->update($login_details['user_data']['student_id'], 'student_id');
		} else {
			$result = $profile->create();
		}
		//debug($result);

		if (!$result) {
			$status = 'failed';
			$_SESSION['errors']['register'] = "Update Failed!";
		}

	}

} else {
	$status = 'failed';
	$_SESSION['errors']['register'] = "Invalid Update Data!";
}

header("location:../profile-details.php?type=student&status=$status");
