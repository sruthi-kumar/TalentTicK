<?php

class Location extends Dbh {

	private $id;
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

	function getStates() {

		$states = [];

		$sql = "SELECT * FROM $this->table_name_state ";
		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$states[] = $row;
		}

		return $states;

	}function getDistricts($state_id = null) {

		$districts = [];

		$sql = " SELECT $this->table_name_district.* , $this->table_name_state.name as state FROM $this->table_name_district ";
		$sql .= " JOIN $this->table_name_state ON $this->table_name_state.id =  $this->table_name_district.state_id ";

		if (isset($state_id)) {

			$sql .= " WHERE $this->table_name_district.state_id = $state_id ";

		}

		//debug($sql);

		$result = $this->connect()->query($sql);
		while ($row = $result->fetch()) {
			$districts[] = $row;
		}

		return $districts;

	}

	function getStateById($id = null) {

		$this->id = $id ?? $this->id;

		$state = [];

		$sql = "SELECT * FROM $this->table_name_state WHERE id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->id];
		$stmt->execute($params);
		$state = $stmt->fetch();

		return $state;

	}

	function getDistrictById($id = null) {

		$this->id = $id ?? $this->id;

		$district = [];

		$sql = "SELECT * FROM $this->table_name_district WHERE id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->id];
		$stmt->execute($params);
		$district = $stmt->fetch();

		return $district;

	}

	function createState() {

		$model_data = set_model_data($this->toArray());

		//debug($model_data);

		$params = $model_data['values'];

		$sql = " INSERT INTO $this->table_name_state (" . $model_data['fields'] . ") VALUES (" . $model_data['placeholder'] . " )";
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

	function createDistrict() {

		$model_data = set_model_data($this->toArray());

		//debug($model_data);

		$params = $model_data['values'];

		$sql = " INSERT INTO $this->table_name_district (" . $model_data['fields'] . ") VALUES (" . $model_data['placeholder'] . " )";
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

	function updateState($id = null) {

		$model_data = set_model_data($this->toArray());

		$params = $model_data['values'];

		$params[] = $id ?? $this->id;

		$sql = "UPDATE $this->table_name_state( " . $model_data['fields'] . " ) values(" . $model_data['placeholder'] . ") WHERE id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);

	}

	function updateState($id = null) {

		$model_data = set_model_data($this->toArray());

		$params = $model_data['values'];

		$params[] = $id ?? $this->id;

		$sql = "UPDATE $this->table_name_district ( " . $model_data['fields'] . " ) values(" . $model_data['placeholder'] . ") WHERE id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);

	}

}