<?php

class Location extends Dbh {

	private $user_id;
	private $username;
	private $password;
	private $type;
	private $status = 'active';
	private $created_at;
	private $updated_at;

	private $table_name_state = "location_states";
	private $table_name_district = "location_districts";

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

	function getStates($limit = null) {

		$states = [];

		$sql = "SELECT * FROM $this->table_name_state ";
		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$states[] = $row;
		}

		return $states;

	}function getDistricts($limit = null) {

		$users = [];

		$sql = " SELECT $this->table_name_district.* , $this->table_name_state.name as state FROM $this->table_name_district ";
		$sql .= " JOIN $this->table_name_state ON $this->table_name_state.id =  $this->table_name_district.state_id ";

		//debug($sql);

		$result = $this->connect()->query($sql);
		while ($row = $result->fetch()) {
			$users[] = $row;
		}

		return $users;

	}

	function getStateById($user_id = null) {

		$this->user_id = $user_id ?? $this->user_id;

		$user_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE user_id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->user_id];
		$stmt->execute($params);
		$user_data = $stmt->fetch();

		return $user_data;

	}

	function createState() {

		$model_data = set_model_data($this->toArray());

		//debug($model_data);

		$params = $model_data['values'];

		$sql = " INSERT INTO $this->table_name (" . $model_data['fields'] . ") VALUES (" . $model_data['placeholder'] . " )";
		$stmt = $this->connect()->prepare($sql);

		if ($stmt->execute($params)) {
			//return $this->connect()->lastInsertId($this->table_name);
			return $this->getLocationByLocationname($this->username);
		} else {
			debug($this->connect()->errorCode(), false);
			debug($this->connect()->errorInfo());
			return false;
		}
	}

	function updateLocation($user_id = null) {

		$model_data = set_model_data($this->toArray());

		$params = $model_data['values'];

		$params[] = $user_id ?? $this->user_id;

		$sql = "UPDATE $this->table_name ( " . $model_data['fields'] . " ) values(" . $model_data['placeholder'] . ") WHERE user_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);

	}

}