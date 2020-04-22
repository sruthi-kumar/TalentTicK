<?php
include_once ('autoload.php');

$user = new User();


$user->username = $_POST['email'];
$user->password = md5($_POST['password']);  
$user->type = 'student';  
 
if( $user->createUser() )
{  
	header('location:registration-success.php?type='.$user->type);
	 
}else{
	header('location:login.php');
}