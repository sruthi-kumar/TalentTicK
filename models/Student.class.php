<?php

class Student extends Dbh {

	private $student_id;
	private $user_id;
	private $firstname;
	private $lastname;
	private $mobile_number;
	private $gender;

	private $table_name = "students";

	function setStudentData($type, $data) {

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

		$params = [];
		$params[] = $this->user_id;
		$params[] = $this->firstname;
		$params[] = $this->lastname;
		$params[] = $this->mobile_number;
		$params[] = $this->gender;

		$sql = "INSERT INTO $this->table_name ( user_id , firstname, lastname, mobile_number, gender) values(?,?,?,?,?)";
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

		$params = [];
		$params[] = $this->user_id;
		$params[] = $this->firstname;
		$params[] = $this->lastname;
		$params[] = $this->mobile_number;
		$params[] = $this->gender;
		$params[] = $student_id ?? $this->student_id;

		$sql = "UPDATE $this->table_name ( user_id , firstname, lastname, mobile_number, gender) values(?,?,?,?,?) WHERE student_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);

	}

}