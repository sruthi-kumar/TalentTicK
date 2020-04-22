<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$site_name = 'TalenTick' ;
$web_assets = base_url().'/assets/web' ; 
$admin_assets = base_url().'/assets/admin' ;

function base_url(){
	$localfolder = "" ;
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }

    if($_SERVER['HTTP_HOST'] == 'localhost') {
    	$localfolder = explode('/', $_SERVER['PHP_SELF'] ) ; 

    	$localfolder = '/'.$localfolder[1] ; 

    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'].$localfolder;
}



function debug($data , $die = true ){
    echo"<pre>"; 
    var_dump($data) ; 
    if($die) exit ;
}