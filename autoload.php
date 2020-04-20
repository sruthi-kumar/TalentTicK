<?php 
include_once ($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once ($_SERVER['DOCUMENT_ROOT'].'/lib/auth.php'); 
 
spl_autoload_register('load_library');   
spl_autoload_register('load_model'); 

function load_library($class_name){
	$path = $_SERVER['DOCUMENT_ROOT'].'/lib/';
	$extention = '.class.php';
	$full_path = $path.$class_name.$extention;

	if(file_exists($full_path)) { 
		include_once( $full_path)  ; 
	}
} 

function load_model($class_name){
	$path = $_SERVER['DOCUMENT_ROOT'].'/models/'; 
	$extention = '.class.php';
	$full_path = $path.$class_name.$extention;
	if(file_exists($full_path)) {
		include_once( $full_path)  ; 
	}
}