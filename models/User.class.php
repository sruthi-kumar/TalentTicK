<?php

class User extends Dbh
{

	private $user_id;
	private $username;
	private $password;
	private $type;
	private $created_at;
	private $updated_at;

	private $table_name ="users";
	 
	function getUsers($limit = null){

		$user = [] ; 

		$sql = "SELECT * FROM $this->table_name ";
		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			 $user[] = $row ; 
		}

		return $users ; 

	}

	function getUserByEmail($username){

		$user_data = [] ; 

		$sql="SELECT * FROM $this->table_name WHERE username=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$username] ; 
		$stmt->execute($params);
		$user_data = $stmt->fetch();

		return $user_data ; 

	}

	function createUser(){

		$params=[];
		$params[] = $this->username; 
		$params[] = $this->password;
		$params[] = $this->type;

		$sql="INSERT INTO $this->table_name (username,password,type) values(?,?,?)";
		$stmt = $this->connect()->prepare($sql); 
		$stmt->execute($params);
		$stmt->exec($params); 

	}

	function updateUser(){

		$params=[];
		$params[] = $this->username; 
		$params[] = $this->password;
		$params[] = $this->type;
		$params[] = $this->user_id; 

		$sql="UPDATE $this->table_name (username,password,type) values(?,?,?) WHERE user_id = ?";
		$stmt = $this->connect()->prepare($sql); 
		$params[] = $user_id ; 
		$stmt->execute($params);
		$stmt->exec($params); 

	}
 
}