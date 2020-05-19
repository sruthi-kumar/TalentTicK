<?php

class Job extends Dbh {

	/*
		`jobs` WHERE 1 `id`, `recruiter`, `job_title`, `job_description`, `job_type`, `district_id`, `qualified_branches`, `CGPA_min`, `backlog_count`, `salary_min`, `salary_max`, `vacancies`, `status`, `last_date_to_apply`, `created_at`, `updated_at`

		`job_types` WHERE 1 `id`, `job_type`, `status`
	*/

	private $id;
	private $recruiter;
	private $job_title;
	private $job_description;
	private $job_type = 1;
	private $district_id;
	private $qualified_branches;
	private $last_date_to_apply;
	private $backlog_count;
	private $CGPA_min;
	private $salary_min;
	private $salary_max;
	private $vacancies;
	private $status = 'active';

	private $table_name = "jobs";

	function __construct() {

		parent::__construct();

		$this->set_table_name($this->table_name);
	}

	function toArray() {
		$params = [];
		$params['recruiter'] = $this->recruiter ?? '';
		$params['job_title'] = $this->job_title ?? '';
		$params['job_type'] = $this->job_type ?? '';
		$params['job_description'] = $this->job_description ?? '';
		$params['district_id'] = $this->district_id ?? '';
		$params['qualified_branches'] = $this->qualified_branches ?? '';
		$params['last_date_to_apply'] = $this->last_date_to_apply ?? '';
		$params['backlog_count'] = $this->backlog_count ?? '';
		$params['CGPA_min'] = $this->CGPA_min ?? '';
		$params['salary_min'] = $this->salary_min ?? '';
		$params['salary_max'] = $this->salary_max ?? '';
		$params['vacancies'] = $this->vacancies ?? '';
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

	function getJobTypes() {
		$job_types = [];
		$sql = "SELECT * FROM job_types";
		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$job_types[] = $row;
		}

		return $job_types;

	}

	function getJobs($type = 'list', $recruiter = null) {

		$jobs = [];

		$sql = "SELECT $this->table_name.* , recruiters.company_name , job_types.job_type as JobType  , location_districts.district as District , location_states.name as State  FROM $this->table_name ";
		$sql .= " JOIN recruiters ON recruiters.id = $this->table_name.recruiter ";
		$sql .= " JOIN job_types ON job_types.id = $this->table_name.job_type ";
		$sql .= " JOIN location_districts ON location_districts.id = $this->table_name.district_id ";
		$sql .= " JOIN location_states ON location_states.id = location_districts.state_id ";

		if ($type == 'count') {
			$sql = "SELECT COUNT(*) as count FROM $this->table_name ";
		}
		if ($type != "list_all" && $recruiter == null) {

			$sql .= " WHERE date(last_date_to_apply)>curdate()";

		}

		if (isset($recruiter)) {
			$sql .= " WHERE recruiter = $recruiter";
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

		$sql = "SELECT $this->table_name.* , recruiters.company_name , job_types.job_type as JobType  , location_districts.district as District , location_states.name as State  FROM $this->table_name ";
		$sql .= " JOIN recruiters ON recruiters.id = $this->table_name.recruiter ";
		$sql .= " JOIN job_types ON job_types.id = $this->table_name.job_type ";
		$sql .= " JOIN location_districts ON location_districts.id = $this->table_name.district_id ";
		$sql .= " JOIN location_states ON location_states.id = location_districts.state_id ";

		$sql .= " WHERE  $this->table_name.id=?";
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

	function getJobByRecruiter($recruiter = null) {

		$this->recruiter = $recruiter ?? $this->recruiter;

		$job_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE recruiter=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->recruiter];
		$stmt->execute($params);
		$job_data = $stmt->fetchAll();

		return $job_data;

	}
}