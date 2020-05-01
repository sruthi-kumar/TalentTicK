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

	function setData($type, $data) {

		switch ($type) {
		case 'id':
			$this->id = $data;
			break;
		case 'user':
			$this->user = $data;
			break;
		case 'job':
			$this->job = $data;
			break;
		case 'status':
			$this->status = $data;
			break;
		}

	}

	function getJobApplications($user_id = null, $user_type = null) {

		$jobs = [];

		$sql = "SELECT $this->table_name.*, jobs.job_title , job_types.job_type, students.firstname,students.lastname, recruiters.company_name FROM $this->table_name ";
		$sql .= " JOIN users ON users.id = $this->table_name.user ";
		$sql .= " JOIN students ON students.user_id =  users.id ";
		$sql .= " JOIN jobs ON jobs.id = $this->table_name.job ";
		$sql .= " JOIN job_types ON job_types.id = jobs.job_type ";
		$sql .= " JOIN recruiters ON recruiters.id = jobs.recruiter ";

		if (isset($user_id) && isset($user_type)) {

			if ($user_type == "recruiter") {

				$sql .= " WHERE jobs.recruiter = $user_id ";
			}

			if ($user_type == "student") {

				$sql .= " WHERE students.id = $user_id ";
			}

		}

		//debug($sql);

		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$jobs[] = $row;
		}

		return $jobs;

	}

	function getJobApplicationById($id = null) {

		$this->id = $id ?? $this->id;

		$job_data = [];

		$sql = "SELECT $this->table_name.*, jobs.job_title , job_types.job_type, students.firstname,students.lastname FROM $this->table_name ";
		$sql .= " JOIN users ON users.id = $this->table_name.user ";
		$sql .= " JOIN students ON students.user_id =  users.id ";
		$sql .= " JOIN jobs ON jobs.id = $this->table_name.job ";
		$sql .= " JOIN job_types ON job_types.id = jobs.job_type ";

		$sql .= "  WHERE $this->table_name.id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->id];
		$stmt->execute($params);
		$job_data = $stmt->fetch();

		return $job_data;

	}

	function getJobApplicationByJobApplicationname($jobname = null) {

		$this->jobname = $jobname ?? $this->jobname;

		$job_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE jobname=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->jobname];
		$stmt->execute($params);
		$job_data = $stmt->fetch();

		return $job_data;

	}
}