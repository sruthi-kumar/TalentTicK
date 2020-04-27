<?php

class Job extends Dbh {

	/*`jobs` WHERE 1 `id`, `recruiter`, `job_title`, `job_description`, `job_type`, `state_id`, `district_id`, `last_date_to_apply`, `backlog_count`, `CGPA_min`, `CGPA_max`, `salary_min`, `salary_max`, `vacancies`, `status`, `created_at`, `updated_at`*/

	private $id;
	private $recruiter;
	private $job_title;
	private $job_description;
	private $job_type;
	private $state_id;
	private $district_id;
	private $last_date_to_apply;
	private $backlog_count;
	private $CGPA_min;
	private $CGPA_max;
	private $salary_min;
	private $salary_max;
	private $vacancies;
	private $status;

	private $table_name = "jobs";

	function toArray() {
		$params = [];
		$params['recruiter'] = $this->recruiter ?? '';
		$params['job_title'] = $this->job_title ?? '';
		$params['job_description'] = $this->job_description ?? '';
		$params['state_id'] = $this->state_id ?? '';
		$params['district_id'] = $this->district_id ?? '';
		$params['last_date_to_apply'] = $this->last_date_to_apply ?? '';
		$params['backlog_count'] = $this->backlog_count ?? '';
		$params['CGPA_min'] = $this->CGPA_min ?? '';
		$params['CGPA_max'] = $this->CGPA_max ?? '';
		$params['salary_min'] = $this->salary_min ?? '';
		$params['salary_max'] = $this->salary_max ?? '';
		$params['vacancies'] = $this->vacancies ?? '';
		$params['status'] = $this->status ?? '';
		return $params;
	}

	function setData($type, $data) {

		switch ($type) {
		case 'id':
			$this->id = $data;
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

	function getJobs($type = 'list') {

		$jobs = [];

		$sql = "SELECT $this->table_name.* , recruiters.company_name , job_types.job_type as JobType FROM $this->table_name ";
		$sql .= " JOIN recruiters ON recruiters.id = $this->table_name.recruiter ";
		$sql .= " JOIN job_types ON job_types.id = $this->table_name.job_type ";

		if ($type == 'count') {
			$sql = "SELECT COUNT(*) as count FROM $this->table_name ";
		}

		//debug($sql);

		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$jobs[] = $row;
		}

		return $jobs;

	}

	function getJobById($id = null) {

		$this->id = $id ?? $this->id;

		$job_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->id];
		$stmt->execute($params);
		$job_data = $stmt->fetch();

		return $job_data;

	}

	function getJobByJobname($jobname = null) {

		$this->jobname = $jobname ?? $this->jobname;

		$job_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE jobname=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->jobname];
		$stmt->execute($params);
		$job_data = $stmt->fetch();

		return $job_data;

	}

	function createJob() {

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

	function updateJob($id = null) {

		$model_data = set_model_data($this->toArray());

		$params = $model_data['values'];
		$params[] = $id ?? $this->id;

		$sql = "UPDATE $this->table_name (" . $model_data['fields'] . ") values(" . $model_data['placeholder'] . ") WHERE id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);

	}
}