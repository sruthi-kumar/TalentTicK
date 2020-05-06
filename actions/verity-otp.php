<?php
include_once '../autoload.php';
$result = [];

$otp = $_GET['otp'];

if ($otp == "123456") {
	$result = ['status' => "success"];
} else {
	$result = ['status' => "failed"];

}
echo json_encode($result);