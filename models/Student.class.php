<?php

class Student extends Dbh {

	private $student_id;
	private $user_id;
	private $firstname;
	private $lastname;
	private $mobile_number;
	private $gender = "Other";

	private $table_name = "students";

	function toArray() {
		$params = [];
		$params['user_id'] = $this->user_id ?? '';
		$params['firstname'] = $this->firstname ?? '';
		$params['lastname'] = $this->lastname ?? '';
		$params['mobile_number'] = $this->mobile_number ?? '';
		$params['gender'] = $this->gender ?? '';
		return $params;
	}


	function setData($type, $data) {

		switch ($type) {
		case 'student_id':
			$this->student_id = $data;
			break;
		case 'user_id':
			$this->user_id = $data;
			break;
		case 'firstname':
			$this->firstname = $data;
			break;
		case 'lastname':
			$this->lastname = $data;
			break;
		case 'mobile_number':
			$this->mobile_number = $data;
			break;
		case 'gender':
			$this->gender = $data;
			break;
		}

	}

	function getStudents($limit = null) {

		$students = [];

		$sql = "SELECT * FROM $this->table_name ";
		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$student[] = $row;
		}

		return $students;

	}

	function getStudentById($student_id = null) {

		$this->student_id = $student_id ?? $this->student_id;

		$student_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE student_id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->student_id];
		$stmt->execute($params);
		$student_data = $stmt->fetch();

		return $student_data;

	}

	function getStudentByStudentname($studentname = null) {

		$this->studentname = $studentname ?? $this->studentname;

		$student_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE studentname=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->studentname];
		$stmt->execute($params);
		$student_data = $stmt->fetch();

		return $student_data;

	}

	function createStudent() {

		
		$model_data = set_model_data($this->toArray());

		$params = $model_data['values'];

		$sql = "INSERT INTO $this->table_name ( $model_data['fields'] ) values( $model_data['placeholder']) ";
		$stmt = $this->connect()->prepare($sql);

		if ($stmt->execute($params)) {
			//return $this->connect()->lastInsertId($this->table_name);
			return true;
		} else {
			debug($this->connect()->errorCode(), false);
			debug($this->connect()->errorInfo());
			return false;
		}
	}

	function updateStudent($student_id = null) {

		

		$model_data = set_model_data($this->toArray());

		$params = $model_data['values'];
		$params[] = $student_id ?? $this->student_id;

		$sql = "UPDATE $this->table_name ( $model_data['fields'] ) values( $model_data['placeholder']) WHERE student_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);

	}
}