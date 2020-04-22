<?php
include_once ('../autoload.php');

$user = new User();

print_r($_POST) ; exit ;


$user->username = $_POST['email'];
$user->password = md5($_POST['password']);  
$user->type = 'student'; 

$status = 'success' ;  
 
if( $user->createUser() )
{  
		 
}

header("location:registration-status.php?type=$user->type&status=$status");