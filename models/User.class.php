<?php

class User extends Dbh {

	private $id;
	private $username;
	private $password;
	private $type;
	private $status = 'active';
	private $created_at;
	private $updated_at;

	private $table_name = "users";

	function __construct() {

		parent::__construct();

		$this->set_table_name($this->table_name);
	}

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
		case 'id':
			$this->id = $data;
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

	function getUsers($type = 'list') {

		$users = [];

		$sql = "SELECT * FROM $this->table_name ";

		if ($type == 'count') {
			$sql = "SELECT COUNT(*) as count FROM $this->table_name   ";
		}

		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$users[] = $row;
		}

		return $users;

	}

	function getUserById($id = null) {

		$this->id = $id ?? $this->id;

		$user_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->id];
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

}