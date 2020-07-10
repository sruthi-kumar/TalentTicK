<?php

class JobApplication extends Dbh {

	/*

		`job_applications` WHERE 1 `id`, `user`, `job`, `status`, `created_at`, `updated_at``

		`recruiters` WHERE 1 `id`, `user_id`, `company_name`, `email`, `website`, `phone`, `address`, `license`, `city`, `pincode`, `status`, `created_at`, `updated_at`

		 `jobs` WHERE 1 `id`, `recruiter`, `job_title`, `job_description`, `job_type`, `state_id`, `district_id`, `last_date_to_apply`, `backlog_count`, `CGPA_min`, `CGPA_max`, `salary_min`, `salary_max`, `vacancies`, `status`, `created_at`, `updated_at`

		 `job_types` WHERE 1 `id`, `job_type`, `status`

		 `users` WHERE 1 `user_id`, `username`, `password`, `type`, `status`, `created_at`, `updated_at`

		 `students` WHERE 1 `student_id`, `user_id`, `firstname`, `lastname`, `mobile_number`, `gender`, `payment_status`, `created_at`, `updated_at`

	*/

	private $id;
	private $user;
	private $job;
	private $status = 'pending';

	private $table_name = "job_applications";

	function __construct() {

		parent::__construct();

		$this->set_table_name($this->table_name);
	}

	function toArray() {
		$params = [];
		$params['user'] = $this->user ?? '';
		$params['job'] = $this->job ?? '';
		$params['status'] = $this->status ?? '';
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

	function getJobApplications($user_id = null, $user_type = null, $type = 'list') {

		$jobs = [];

		$sql = "SELECT $this->table_name.*, jobs.job_title , job_types.job_type, students.firstname,students.lastname, recruiters.company_name, location_districts.district FROM $this->table_name ";

		if ($type == 'count') {
			$sql = "SELECT COUNT(*) as count FROM $this->table_name ";
		}

		$sql .= " JOIN users ON users.id = $this->table_name.user ";
		$sql .= " JOIN students ON students.user_id =  users.id ";
		$sql .= " JOIN jobs ON jobs.id = $this->table_name.job ";
		$sql .= " JOIN job_types ON job_types.id = jobs.job_type ";
		$sql .= " JOIN recruiters ON recruiters.id = jobs.recruiter ";
		$sql .= " JOIN location_districts ON location_districts.id = jobs.district_id ";

		if ($user_type == 'student') {

			$sql .= "  WHERE $this->table_name.user = $user_id  ";
		}

		//debug($sql);

		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$jobs[] = $row;
		}

		return $jobs;

	}

	function getJobApplicationForJobByStudent($job, $user) {

		$job_data = [];

		$sql = "SELECT $this->table_name.* FROM $this->table_name ";

		$sql .= "  WHERE $this->table_name.job = ? AND $this->table_name.user = ? ";

		//debug($sql);

		$stmt = $this->connect()->prepare($sql);
		$params = [$job, $user];
		$stmt->execute($params);
		$job_data = $stmt->fetch();

		return $job_data;

	}

	function getJobApplicationById($id = null) {

		$this->id = $id ?? $this->id;

		$job_data = [];

		$sql = "SELECT $this->table_name.*";
		$sql .= ", jobs.job_title , job_types.job_type, location_districts.district, students.firstname,students.lastname , students.id as student_id ";
		$sql .= " FROM $this->table_name ";
		$sql .= " JOIN users ON users.id = $this->table_name.user ";
		$sql .= " JOIN students ON students.user_id =  users.id ";
		$sql .= " JOIN jobs ON jobs.id = $this->table_name.job ";
		$sql .= " JOIN job_types ON job_types.id = jobs.job_type ";
		$sql .= " JOIN location_districts ON location_districts.id = jobs.district_id ";

		$sql .= "  WHERE $this->table_name.id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->id];
		$stmt->execute($params);
		$job_data = $stmt->fetch();

		return $job_data;

	}

	function getJobApplicationByJob($job, $type = 'list') {

		$this->job = $job ?? $this->job;

		$job_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE job=?";

		if ($type == 'count') {
			$sql = "SELECT COUNT(*) as count FROM $this->table_name ";
		}

		$stmt = $this->connect()->prepare($sql);
		$params = [$this->job];
		$stmt->execute($params);
		$job_data = $stmt->fetch();

		return $job_data;

	}
}