<?php 

include_once('config/database.php');

/**
 * 
 */
class Dbh 
{
	private $host;
	private $user;
	private $password;
	private $database; 

	function __construct()
	{ 
		$conf = getDbConfig();

		$this->host = $conf['db_host'] ;
		$this->user = $conf['db_user']  ;
		$this->password = $conf['db_password'] ;
		$this->database = $conf['db_name'] ;  
	}

	
	protected function  connect ()
	{
		$dsn = 'mysql:host=' .$this->host . ';dbname=' .$this->database ;
		$pdo = new PDO($dsn , $this->user , $this->password) ;
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC) ;
		return $pdo ; 
	}
} 