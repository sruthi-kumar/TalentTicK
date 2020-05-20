<?php session_start();
$login_status = false;
$login_type = 'guest';

$user_data = $_SESSION['user_data'] ?? null;

if (isset($user_data)) {
	$login_type = $user_data['type'];
}

function validate_user($module, $is_action = false) {

	global $login_type;

	if ($module != 'valid_user') {

		if ($module != $login_type) {
			if ($is_action) {
				header('location:../../login.php');
			} else {
				header('location:../login.php');
			}
			exit;
		}
	}

}

function get_current_user_set() {

	$current_user_set = [];

	$current_user_set['login'] = $_SESSION['user_data']['type'] ?? false;
	$current_user_set['login_type'] = $_SESSION['user_data']['type'] ?? "";
	$current_user_set['user_data'] = $_SESSION['user_data'] ?? [];

	return $current_user_set;
}