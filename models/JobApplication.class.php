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
	private $status;

	private $table_name = "job_applications";

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

	function getJobApplications($recruiter_id = null) {

		$jobs = [];

		$sql = "SELECT $this->table_name.*, jobs.job_title , job_types.job_type, students.firstname,students.lastname FROM $this->table_name ";
		$sql .= " JOIN users ON users.user_id = $this->table_name.user ";
		$sql .= " JOIN students ON students.user_id =  users.user_id ";
		$sql .= " JOIN jobs ON jobs.id = $this->table_name.job ";
		$sql .= " JOIN job_types ON job_types.id = jobs.job_type ";

		if (isset($recruiter_id)) {

			$sql .= " JOIN recruiters ON recruiters.id = jobs.recruiter ";

			$sql .= " WHERE jobs.recruiter = $recruiter_id ";
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

		$sql = "SELECT * FROM $this->table_name WHERE id=?";
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

	function createJobApplication() {

		$model_data = set_model_data($this->toArray());

		$params = $model_data['values'];

		$sql = "INSERT INTO  $this->table_name ( " . $model_data['fields'] . " ) values( " . $model_data['placeholder'] . ") ";
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

	function updateJobApplication($id = null) {

		$model_data = set_model_data($this->toArray());

		$params = $model_data['values'];
		$params[] = $id ?? $this->id;

		$sql = "UPDATE $this->table_name (" . $model_data['fields'] . ") values(" . $model_data['placeholder'] . ") WHERE id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);

	}
}