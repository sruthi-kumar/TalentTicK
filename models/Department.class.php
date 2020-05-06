<?php

class Department extends Dbh {

	/*`departments` WHERE 1 `id`, `department`, `department_title`, `department_description`, `department_type`, `state_id`, `district_id`, `last_date_to_apply`, `backlog_count`, `CGPA_min`, `CGPA_max`, `salary_min`, `salary_max`, `vacancies`, `status`, `created_at`, `updated_at`*/

	private $id;
	private $department;

	private $table_name = "departments";

	function __construct() {

		parent::__construct();

		$this->set_table_name($this->table_name);
	}

	function toArray() {
		$params = [];
		$params['department'] = $this->department ?? '';
		return $params;
	}

	function setData($type, $data) {

		switch ($type) {
		case 'id':
			$this->id = $data;
			break;
		case 'department':
			$this->department = $data;
			break;
		}

	}

	function getDepartments($type = 'list') {

		$departments = [];

		$sql = "SELECT * FROM $this->table_name ORDER BY department ";

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

	function getDepartmentByDepartmentname($department = null) {

		$this->department = $department ?? $this->department;

		$department_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE department=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->department];
		$stmt->execute($params);
		$department_data = $stmt->fetch();

		return $department_data;

	}
}