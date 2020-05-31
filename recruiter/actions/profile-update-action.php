<?php
require_once '../../autoload.php';

validate_user('recruiter', true);

//debug($_POST, false);
//debug($_FILES);

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

/*`recruiter_id`, image `user_id`, `company_name`, `email`, `website`, `phone`, `address`, `license`, `city`, `pincode*/

	$recruiter = new Recruiter();

	$image_file = $login_details['user_data']['image'];

	if (isset($_FILES) && !empty($_FILES['image'])) {

		/*echo ($_FILES["image"]["name"]);
			echo "<br>";
			echo ($_FILES["image"]["tmp_name"]);
		*/

		$target_dir = "../../uploads/images/";

		$imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

		$enc_name = base64_encode("RECRUITER_" . $_FILES["image"]["name"] . $login_details['user_data']['user_id']) . "." . $imageFileType;
		$target_file = $target_dir . $enc_name;

		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

			$image_file = $enc_name;
			echo ("File Uploaded");

		} else {
			echo ("File Upload Failed");
		}

	}

	if (isset($_FILES) && !empty($_FILES['license_file'])) {

		/*echo ($_FILES["license_file"]["name"]);
			echo "<br>";
			echo ($_FILES["license_file"]["tmp_name"]);
		*/

		$target_dir = "../../uploads/licenses/";

		$imageFileType = strtolower(pathinfo($_FILES["license_file"]["name"], PATHINFO_EXTENSION));

		$enc_name = base64_encode("SSLC_" . $_FILES["license_file"]["name"] . $login_details['user_data']['user_id']) . "." . $imageFileType;
		$target_file = $target_dir . $enc_name;

		if (move_uploaded_file($_FILES["license_file"]["tmp_name"], $target_file)) {

			$license_file = $enc_name;
			echo ("<br> license_file File Uploaded");

			$recruiter->setData('license_file', $license_file);

		} else {
			echo ("<br> license_file File Upload Failed");
		}

	}

	$recruiter->setData('user_id', $login_details['user_data']['user_id']);
	$recruiter->setData('company_name', trim($_POST['company_name']));
	$recruiter->setData('email', trim($_POST['email']));
	$recruiter->setData('website', trim($_POST['website']));
	$recruiter->setData('phone', trim($_POST['phone']));
	$recruiter->setData('address', trim($_POST['address']));
	$recruiter->setData('license', trim($_POST['license']));
	$recruiter->setData('city', trim($_POST['city']));
	$recruiter->setData('pincode', trim($_POST['pincode']));
	$recruiter->setData('image', $image_file);
	$recruiter->setData('status', trim($_POST['status']));

	//debug($recruiter);

	$result = $recruiter->update($login_details['user_data']['recruiter_id']);
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

header("location:../profile-details.php?type=recruiter&status=$status");
