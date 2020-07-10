<?php
require_once '../../autoload.php';

validate_user('admin');

$status = 'success';

$department = new Department();
/*
`departments` WHERE 1 `id`, `department`*/

$department_details = $department->getDepartmentByDepartmentname($_POST['department']);

//debug($department_details);

if (!$department_details) {
	$status = 'failed';
	$_SESSION['errors']['department'] = "Department" . $_POST['department'] . "Already Exists!";
} else {
	if (isset($_POST['action'])) {
		header("location:../department.php?status=failed&action=" . $_POST['action']);
	} else {
		header("location:../department.php?status=failed");
	}

}

if (isset($_POST['id']) && isset($_POST['action'])) {

	//$department_details = $department->getDepartmentById($_POST['id']);

	//debug($department_details);

	$department->setData('department', $_POST['department']);

	$result = $department->update($_POST['id']);

	//debug($result);

	if (!$result) {
		$status = 'failed';
		$_SESSION['errors']['register'] = "Update Failed!";
	}

} else {

	$department->setData('department', strtoupper($_POST['department']));

	$result = $department->create();

	//debug($result);

	if ($result) {
		$status = 'success';
	} else {
		$_SESSION['errors']['department'] = "Post Failed!";
		header("location:../department-list.php?status=$status");
		exit;
	}
}

header("location:../department.php?id=" . $_POST['id'] . "&status=$status");
