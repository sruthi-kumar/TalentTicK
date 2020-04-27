<?php

class Student extends Dbh {

	/*

		`users` WHERE 1 `user_id`, `username`, `password`, `type`, `status`, `created_at`, `updated_at`

		`students` WHERE 1 `id`, `user_id`, `firstname`, `lastname`, `mobile_number`, `gender`, `branch_id`, `payment_status`, `created_at`, `updated_at`

		`departments` WHERE 1 `id`, `department`

		`branches` WHERE  `id`, `branch`, `department_id`

		 `profiles` WHERE 1 `profile_id`, `student_id`, `dob`, `address`, `addressline2`, `addressline3`, `state_id`, `district_id`, `pincode`, `cgpa`, `gpg`, `gug`, `gplus`, `g10`, `backlogs`, `resume`, `highest_qualification`

	*/

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

	function getStudents($type = 'list') {

		$students = [];

		$sql = " SELECT $this->table_name.* ,branches.branch , departments.department  FROM $this->table_name ";
		$sql .= " JOIN branches ON branches.id = $this->table_name.branch_id ";
		$sql .= " JOIN departments ON departments.id = branches.department_id ";

		if ($type == 'count') {
			$sql = "SELECT COUNT(*) as count FROM $this->table_name ";
		}
		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$students[] = $row;
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

		$sql = "INSERT INTO " . $this->table_name . " (" . $model_data['fields'] . ") values(" . $model_data['placeholder'] . ") ";
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

		$sql = "UPDATE " . $this->table_name . " (" . $model_data['fields'] . ") values(" . $model_data['placeholder'] . ")  WHERE student_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);

	}
}