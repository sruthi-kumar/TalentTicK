<?php
include_once ('autoload.php');

$email = $_POST['email'];
$password = $_POST['password'];  

$user = new User();

$user_data = $user->getUserByEmail($email) ; 
 
if( !empty( $user_data ) )
{ 
	if($user_data['password'] == $password  ){
		$_SESSION['user_data'] = $user_data ; 
		header('location:index.php');
	}else{

	}
}else{
	header('location:login.php');
}