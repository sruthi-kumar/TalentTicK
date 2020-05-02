<?php
require_once '../../autoload.php';

validate_user('admin');

$status = 'success';

//debug($_POST);

$branch = new Branch();
/*
`branchs` WHERE 1 `id`, `branch`*/

if (isset($_POST['id']) && isset($_POST['action'])) {

	//$branch_details = $branch->getBranchById($_POST['id']);

	//debug($branch_details);

	$branch->setData('branch', $_POST['branch']);
	$branch->setData('department_id', $_POST['department_id']);

	$result = $branch->update($_POST['id']);

	//debug($result);

	if (!$result) {
		$status = 'failed';
		$_SESSION['errors']['register'] = "Update Failed!";
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

header("location:../branch.php?id=" . $_POST['id'] . "&status=$status");
