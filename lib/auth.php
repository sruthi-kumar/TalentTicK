<?php session_start();
$login_status = false;
$login_type = '';

$user_data = $_SESSION['user_data']??null ;  

if(isset($user_data)){
	$login_status = true;
	switch( $user_data['usertype']) {
		case 1 : 
		$login_type = 'admin' ;
		case 1 : 
		$login_type = 'company' ;
		case 2 : 
		$login_type = 'student' ;
	}
}