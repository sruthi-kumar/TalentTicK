<?php
require_once '../../autoload.php';

validate_user('admin');

$status = 'success';

//debug($_POST);

$branch = new Branch();

$branch_details = $branch->getBranchByBranchname($_POST['branch'], $_POST['department_id']);

//debug($branch_details);

if ($branch_details) {
	$status = 'failed';
	$_SESSION['errors']['branch'] = "Error! Branch already exists!";

	if (isset($_POST['action'])) {
		header("location:../branch.php?status=failed&action=" . $_POST['action']);
	} else {
		header("location:../branch.php?status=failed");
	}
	exit;

} else {

	if (isset($_POST['id']) && isset($_POST['action'])) {

		$branch_details = $branch->getBranchById($_POST['id']);

		//debug($branch_details);

		$branch->setData('branch', $_POST['branch']);
		$branch->setData('department_id', $_POST['department_id']);

		$result = $branch->update($_POST['id']);

		//debug($result);

		if (!$result) {
			$status = 'failed';
			$_SESSION['errors']['branch'] = "Update Failed!";
		}

	} else {

		$branch->setData('branch', $_POST['branch']);
		$branch->setData('department_id', $_POST['department_id']);

		$result = $branch->create();

		//debug($result);

		if (!$result) {
			$status = 'failed';
			$_SESSION['errors']['branch'] = "Post Failed!";
		} else {
			header("location:../branch-list.php?status=$status");
			exit;

		}
	}

}

header("location:../branch.php?id=" . $_POST['id'] . "&status=$status");
