<?php

class Branch extends Dbh {

	/*`branchs` WHERE 1 `id`, `recruiter`, `branch_title`, `branch_description`, `branch_type`, `department_id`, `district_id`, `last_date_to_apply`, `backlog_count`, `CGPA_min`, `CGPA_max`, `salary_min`, `salary_max`, `vacancies`, `status`, `created_at`, `updated_at`*/

	private $id;
	private $recruiter;
	private $branch_title;
	private $branch_description;
	private $branch_type;
	private $department_id;
	private $district_id;
	private $last_date_to_apply;
	private $backlog_count;
	private $CGPA_min;
	private $CGPA_max;
	private $salary_min;
	private $salary_max;
	private $vacancies;
	private $status;

	private $table_name = "branches";

	function toArray() {
		$params = [];
		$params['recruiter'] = $this->recruiter ?? '';
		$params['branch_title'] = $this->branch_title ?? '';
		$params['branch_description'] = $this->branch_description ?? '';
		$params['department_id'] = $this->department_id ?? '';
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

	function getBranches($type = 'list', $department_id = null) {

		$branchs = [];

		$sql = " SELECT $this->table_name.* , departments.department FROM $this->table_name ";
		$sql .= " JOIN departments ON departments.id =  $this->table_name.department_id ";

		if (isset($department_id)) {

			$sql .= " WHERE $this->table_name.department_id = $department_id ";

		}

		if ($type == 'count') {
			$sql = "SELECT COUNT(*) as count FROM $this->table_name ";
		}

		//debug($sql);

		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$branchs[] = $row;
		}

		return $branchs;

	}

	function getBranchById($id = null) {

		$this->id = $id ?? $this->id;

		$branch_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->id];
		$stmt->execute($params);
		$branch_data = $stmt->fetch();

		return $branch_data;

	}

	function getBranchByBranchname($branchname = null) {

		$this->branchname = $branchname ?? $this->branchname;

		$branch_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE branchname=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->branchname];
		$stmt->execute($params);
		$branch_data = $stmt->fetch();

		return $branch_data;

	}

	function createBranch() {

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

	function updateBranch($id = null) {

		$model_data = set_model_data($this->toArray());

		$params = $model_data['values'];
		$params[] = $id ?? $this->id;

		$sql = "UPDATE $this->table_name SET (" . $model_data['fields'] . ") values(" . $model_data['placeholder'] . ") WHERE id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);

	}
}