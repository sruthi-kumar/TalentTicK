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


	function setUserData($type , $data){

		switch ($type) {
			case 'user_id':
				$this->user_id = $data ; 
				break;
			case 'username':
				$this->username = $data ; 
				break;
			case 'password':
				$this->username = $data ; 
				break;
			case 'type':
				$this->username = $data ; 
				break;
	 
}

		
	}
	 
	function getUsers($limit = null){

		$user = [] ; 

		$sql = "SELECT * FROM $this->table_name ";
		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			 $user[] = $row ; 
		}

		return $users ; 

	}

	function getUserById($user_id =null){

		$this->user_id =$user_id ?? $this->user_id ; 

		$user_data = [] ; 

		$sql="SELECT * FROM $this->table_name WHERE user_id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->user_id] ; 
		$stmt->execute($params);
		$user_data = $stmt->fetch();

		return $user_data ; 

	}

	function getUserByUsername($username = null ){

		$this->username =$username ?? $this->username ; 

		$user_data = [] ; 

		$sql="SELECT * FROM $this->table_name WHERE username=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->username] ; 
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
		return $stmt->exec($params); 

	}

	function updateUser($user_id =null){
 
		$params=[];
		$params[] = $this->username; 
		$params[] = $this->password;
		$params[] = $this->type;
		$params[] = $user_id ?? $this->user_id ; 

		$sql="UPDATE $this->table_name (username,password,type) values(?,?,?) WHERE user_id = ?";
		$stmt = $this->connect()->prepare($sql);  
		$stmt->execute($params);
		$stmt->exec($params); 

	}
 
}