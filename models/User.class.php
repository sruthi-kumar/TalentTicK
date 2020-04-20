<?php

class User extends Dbh
{
	 
	function getUsers($limit = null){

		$user = [] ; 

		$sql = "SELECT * FROM users ";
		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			 $user[] = $row ; 
		}

		return $users ; 

	}

	function getUserByEmail($username){

		$user_data = [] ; 

		$sql="SELECT * FROM loginn1 WHERE username=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$username] ; 
		$stmt->execute($params);
		$user_data = $stmt->fetch();

		return $user_data ; 

	}
}