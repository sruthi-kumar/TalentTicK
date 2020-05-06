<?php

class Branch extends Dbh {

	/*`branches` WHERE 1 `id`, `branch`, `department_id` */

	private $id;
	private $branch;
	private $department_id;

	private $table_name = "branches";

	function __construct() {

		parent::__construct();

		$this->set_table_name($this->table_name);
	}

	function toArray() {
		$params = [];
		$params['branch'] = $this->branch ?? '';
		$params['department_id'] = $this->department_id ?? '';
		return $params;
	}

	function setData($type, $data) {

		switch ($type) {
		case 'id':
			$this->id = $data;
			break;
		case 'branch':
			$this->branch = $data;
			break;
		case 'department_id':
			$this->department_id = $data;
			break;
		}

	}

	function getBranches($type = 'list', $department_id = null) {

		$branchs = [];

		$sql = " SELECT $this->table_name.* , departments.department FROM $this->table_name ";
		$sql .= " JOIN departments ON departments.id =  $this->table_name.department_id ORDER BY $this->table_name.branch";

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

	function getBranchByBranchname($branch = null, $department_id = null) {

		$this->branch = $branch ?? $this->branch;

		$branch_data = [];

		if (isset($department_id)) {

			$sql = "SELECT * FROM $this->table_name WHERE branch=? AND department_id=?";

			$params = [$this->branch, $department_id];

		} else {

			$sql = "SELECT * FROM $this->table_name WHERE branch=?";
			$params = [$this->branch];
		}

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);
		$branch_data = $stmt->fetch();

		return $branch_data;

	}
}