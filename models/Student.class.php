<?php

class Student extends Dbh {

	/*

				`users` WHERE 1 `user_id`, `username`, `password`, `type`, `status`, `created_at`, `updated_at`

				SELECT * FROM `students` WHERE 1 `id`, `user_id`, `firstname`, `lastname`, `mobile_number`, `gender`, `branch_id`, `payment_status`, `payment_id`, `payment_method`, `payment_date`, `image`, `created_at`, `updated_at`

				`departments` WHERE 1 `id`, `department`

				`branches` WHERE  `id`, `branch`, `department_id`

				 `profiles` WHERE 1 `id`, `student_id`, `dob`, `address`, `addressline2`, `addressline3`, `state_id`, `district_id
		cgpa
		backlogs`, `pincode`, `district_id
		cgpa
		backlogs`, `gpg`, `gug`, `gplus`, `g10`, `district_id
		cgpa
		backlogs`, `resume`, `highest_qualification`

	*/

	private $id;
	private $user_id;
	private $firstname;
	private $lastname;
	private $mobile_number;
	private $image;
	private $gender = "Other";
	private $branch_id;
	private $payment_status = "pending";
	private $payment_id;
	private $payment_method;
	private $payment_date;

	private $table_name = "students";

	function __construct() {

		parent::__construct();

		$this->set_table_name($this->table_name);
	}

	function toArray() {
		$params = [];
		$params['user_id'] = $this->user_id ?? '';
		$params['firstname'] = $this->firstname ?? '';
		$params['lastname'] = $this->lastname ?? '';
		$params['branch_id'] = $this->branch_id ?? null;
		$params['payment_status'] = $this->payment_status ?? 'pending';
		$params['mobile_number'] = $this->mobile_number ?? '';
		$params['payment_id'] = $this->payment_id ?? '';
		$params['payment_method'] = $this->payment_method ?? '';
		$params['payment_date'] = $this->payment_date ?? '';
		$params['gender'] = $this->gender ?? '';
		$params['image'] = $this->image ?? 'default.jpg';
		return $params;
	}

	function setData($property, $value) {

		$this->__set($property, $value);

	}

	public function __get($property) {
		if (property_exists($this, $property)) {
			return $this->$property;
		}
	}

	public function __set($property, $value) {
		if (property_exists($this, $property)) {
			$this->$property = $value;
		}
	}
	function getMaxId() {

		$sql = "SELECT MAX(id) as max_id FROM $this->table_name";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		$student_data = $stmt->fetch();
		return $student_data;

	}

	function getStudents($type = 'list', $filters = null) {

		$students = [];

		$sql = " SELECT $this->table_name.*,  users.username as email ,branches.branch , departments.department ,branches.id as branch_id  , profiles.district_id , profiles.cgpa, profiles.backlogs FROM $this->table_name ";
		$sql .= " LEFT JOIN branches ON branches.id = $this->table_name.branch_id ";
		$sql .= " LEFT JOIN departments ON departments.id = branches.department_id ";
		$sql .= " LEFT JOIN profiles ON profiles.student_id = $this->table_name.id ";
		$sql .= " JOIN users ON users.id = $this->table_name.user_id ";

		/*if (isset($filters)) {

				$sql .= " WHERE ";

			}
		*/
		if ($type == 'count') {
			$sql = "SELECT COUNT(*) as count FROM $this->table_name ";
		}
		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$students[] = $row;
		}

		return $students;

	}

	function getStudentById($id = null) {

		/*`

			users` WHERE 1 `id`, `username`, `password`, `type`, `status`, `created_at`, `updated_at`

			`students` WHERE 1 `id`, `user_id`, `firstname`, `lastname`, `mobile_number`, `gender`, `branch_id`, `payment_status`, `image`, `created_at`, `updated_at`

			 `profiles` WHERE 1 `id`, `student_id`, `dob`, `address`, `addressline2`, `addressline3`, `state_id`, `district_id`, `pincode`, `cgpa`, `gpg`, `gug`, `gplus`, `g10`, `backlogs`, `resume`, `highest_qualification`

			 `location_districts` WHERE 1 `id`, `state_id`, `district`, `status`

			  `location_states` WHERE 1 `id`, `name`

		*/

		$this->id = $id ?? $this->id;

		$student_data = [];

		$sql = " SELECT $this->table_name.* ";
		$sql .= ", users.username as email ,
		branches.branch ,
		departments.department ,
		location_districts.district,
		location_states.name as state,
		profiles.* ";
		$sql .= "FROM $this->table_name ";
		$sql .= " JOIN users ON users.id = $this->table_name.user_id ";
		$sql .= " LEFT JOIN profiles ON profiles.student_id = $this->table_name.id ";
		$sql .= " LEFT JOIN branches ON branches.id = $this->table_name.branch_id ";
		$sql .= " LEFT JOIN departments ON departments.id = branches.department_id ";
		$sql .= " LEFT JOIN location_districts ON location_districts.id =  profiles.district_id ";
		$sql .= " LEFT JOIN location_states ON location_states.id = location_districts.state_id ";

		$sql .= " WHERE  $this->table_name.id=?";

		//debug($sql);

		$stmt = $this->connect()->prepare($sql);
		$params = [$this->id];
		$stmt->execute($params);
		$student_data = $stmt->fetch();

		return $student_data;

	}

	function getStudentByUserId($user_id = null) {

		$this->user_id = $user_id ?? $this->user_id;

		$recruiter_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE user_id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->user_id];
		$stmt->execute($params);
		$recruiter_data = $stmt->fetch();

		return $recruiter_data;

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
}