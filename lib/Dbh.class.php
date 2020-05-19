<?php

include_once __DIR__ . '/../config/database.php';
include_once __DIR__ . '/ConnectDb.php';

/**
 *
 */
class Dbh {

	private $table_name;
	private $id;

	public function __construct() {
	}

	protected function connect() {

		$instance = ConnectDb::getInstance();
		$conn = $instance->getConnection();
		//var_dump($conn);
		return $conn;
	}

	protected function set_table_name($table_name) {

		$this->table_name = $table_name;
	}

	function getList() {

		$list = [];

		$sql = "SELECT * FROM $this->table_name ";

		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$list[] = $row;
		}

		return $list;

	}

	function create() {

		$model_data = set_model_data($this->toArray());

		$params = $model_data['values'];

		$sql = "INSERT INTO $this->table_name ( " . $model_data['fields'] . " ) values(" . $model_data['placeholder'] . ") ";
		$stmt = $this->connect()->prepare($sql);

		// debug($model_data, false);
		// debug($stmt);

		if ($stmt->execute($params)) {
			//return $this->connect()->lastInsertId($this->table_name);
			return true;
		} else {
			debug($this->connect()->errorCode(), false);
			debug($this->connect()->errorInfo());
			return false;
		}
	}

	function update($id, $id_coloum_name = 'id') {

		$model_data = set_model_data($this->toArray(), 'update');

		//debug($model_data);

		$params = $model_data['values'];

		$params[] = $id;

		$sql = "UPDATE $this->table_name SET " . $model_data['feild_assignments'] . " WHERE $id_coloum_name = ?";
		$stmt = $this->connect()->prepare($sql);

		//debug($model_data, false);
		//debug($stmt);
		if ($stmt->execute($params)) {
			//return $this->connect()->lastInsertId($this->table_name);
			return true;
		} else {
			debug($this->connect()->errorCode(), false);
			debug($this->connect()->errorInfo());
			return false;
		}

	}
}
