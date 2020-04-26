<?php

class User extends Dbh {

	private $user_id;
	private $username;
	private $password;
	private $type;
	private $status = 'active';
	private $created_at;
	private $updated_at;

	private $table_name = "users";

	function toArray() {
		$params = [];
		$params['username'] = $this->username ?? '';
		$params['password'] = $this->password ?? '';
		$params['type'] = $this->type ?? '';
		$params['status'] = $this->status ?? '';
		return $params;
	}

	function setData($type, $data) {

		switch ($type) {
		case 'user_id':
			$this->user_id = $data;
			break;
		case 'username':
			$this->username = $data;
			break;
		case 'password':
			$this->password = $data;
			break;
		case 'type':
			$this->type = $data;
			break;
		case 'status':
			$this->status = $data;
			break;
		}

	}

	function getUsers($limit = null) {

		$users = [];

		$sql = "SELECT * FROM $this->table_name ";
		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$user[] = $row;
		}

		return $users;

	}

	function getUserById($user_id = null) {

		$this->user_id = $user_id ?? $this->user_id;

		$user_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE user_id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->user_id];
		$stmt->execute($params);
		$user_data = $stmt->fetch();

		return $user_data;

	}

	function getUserByUsername($username = null) {

		$this->username = $username ?? $this->username;

		$user_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE username=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->username];
		$stmt->execute($params);
		$user_data = $stmt->fetch();

		return $user_data;

	}

	function createUser() {

		$model_data = set_model_data($this->toArray());

		//debug($model_data);

		$params = $model_data['values'];

		$sql = " INSERT INTO $this->table_name (" . $model_data['fields'] . ") VALUES (" . $model_data['placeholder'] . " )";
		$stmt = $this->connect()->prepare($sql);

		if ($stmt->execute($params)) {
			//return $this->connect()->lastInsertId($this->table_name);
			return $this->getUserByUsername($this->username);
		} else {
			debug($this->connect()->errorCode(), false);
			debug($this->connect()->errorInfo());
			return false;
		}
	}

	function updateUser($user_id = null) {

		$model_data = set_model_data($this->toArray());

		$params = $model_data['values'];

		$params[] = $user_id ?? $this->user_id;

		$sql = "UPDATE $this->table_name ( " . $model_data['fields'] . " ) values(" . $model_data['placeholder'] . ") WHERE user_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);

	}

}