<?php session_start();
$login_status = false;
$login_type = 'guest';

$user_data = $_SESSION['user_data']??null ;  

if(isset($user_data)){
	$login_type = $user_data['type'] ;	 
}else{
	//header('location:../login.php');
}