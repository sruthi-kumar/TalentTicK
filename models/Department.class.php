<?php

class Department extends Dbh {

	/*`departments` WHERE 1 `id`, `recruiter`, `department_title`, `department_description`, `department_type`, `state_id`, `district_id`, `last_date_to_apply`, `backlog_count`, `CGPA_min`, `CGPA_max`, `salary_min`, `salary_max`, `vacancies`, `status`, `created_at`, `updated_at`*/

	private $id;
	private $recruiter;
	private $department_title;
	private $department_description;
	private $department_type;
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

	private $table_name = "departments";

	function __construct() {

		parent::__construct();

		$this->set_table_name($this->table_name);
	}

	function toArray() {
		$params = [];
		$params['recruiter'] = $this->recruiter ?? '';
		$params['department_title'] = $this->department_title ?? '';
		$params['department_description'] = $this->department_description ?? '';
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

	function getDepartments($type = 'list') {

		$departments = [];

		$sql = "SELECT * FROM $this->table_name";

		if ($type == 'count') {
			$sql = "SELECT COUNT(*) as count FROM $this->table_name ";
		}

		//debug($sql);

		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$departments[] = $row;
		}

		return $departments;

	}

	function getDepartmentById($id = null) {

		$this->id = $id ?? $this->id;

		$department_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->id];
		$stmt->execute($params);
		$department_data = $stmt->fetch();

		return $department_data;

	}

	function getDepartmentByDepartmentname($departmentname = null) {

		$this->departmentname = $departmentname ?? $this->departmentname;

		$department_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE departmentname=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->departmentname];
		$stmt->execute($params);
		$department_data = $stmt->fetch();

		return $department_data;

	}
}