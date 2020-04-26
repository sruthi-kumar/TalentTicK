<?php

class Recruiter extends Dbh {

/* recruiter_id ,  user_id ,  company_name ,  email ,  website ,  phone ,  address ,  license ,  city ,  pincode*/

	private $recruiter_id;
	private $user_id;
	private $company_name;
	private $email;
	private $website;
	private $phone;
	private $address;
	private $license;
	private $city;
	private $pincode;

	private $table_name = "recruiters";

	function toArray() {
		$params = [];
		$params['user_id'] = $this->user_id ?? '';
		$params['company_name'] = $this->company_name ?? '';
		$params['email'] = $this->email ?? '';
		$params['website'] = $this->website ?? '';
		$params['phone'] = $this->phone ?? '';
		$params['address'] = $this->address ?? '';
		$params['license'] = $this->license ?? '';
		$params['city'] = $this->city ?? '';
		$params['pincode'] = $this->pincode ?? '';
		return $params;
	}

	function setData($type, $data) {

		switch ($type) {
		case 'recruiter_id':
			$this->recruiter_id = $data;
			break;
		case 'user_id':
			$this->user_id = $data;
			break;
		case 'company_name':
			$this->company_name = $data;
			break;
		case 'email':
			$this->email = $data;
			break;
		case 'website':
			$this->website = $data;
			break;
		case 'phone':
			$this->phone = $data;
			break;
		case 'address':
			$this->address = $data;
			break;
		case 'license':
			$this->license = $data;
			break;
		case 'city':
			$this->city = $data;
			break;
		case 'pincode':
			$this->pincode = $data;
			break;
		}

	}

	function getRecruiters($limit = null) {

		$recruiters = [];

		$sql = "SELECT * FROM $this->table_name ";
		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$recruiters[] = $row;
		}

		return $recruiters;

	}

	function getRecruiterById($recruiter_id = null) {

		$this->recruiter_id = $recruiter_id ?? $this->recruiter_id;

		$recruiter_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE recruiter_id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->recruiter_id];
		$stmt->execute($params);
		$recruiter_data = $stmt->fetch();

		return $recruiter_data;

	}

	function getRecruiterByRecruitername($company_name = null) {

		$this->company_name = $company_name ?? $this->company_name;

		$recruiter_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE company_name=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->company_name];
		$stmt->execute($params);
		$recruiter_data = $stmt->fetch();

		return $recruiter_data;

	}

	function createRecruiter() {

		$model_data = set_model_data($this->toArray());

		$params = $model_data['values'];

		$sql = "INSERT INTO $this->table_name ( " . $model_data['fields'] . " ) values(" . $model_data['placeholder'] . ") ";
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

	function updateRecruiter($recruiter_id = null) {

		$model_data = set_model_data($this->toArray());

		$params = $model_data['values'];

		$params[] = $recruiter_id ?? $this->recruiter_id;

		$sql = "UPDATE $this->table_name (" . $model_data['fields'] . ") values(" . $model_data['placeholder'] . ") WHERE recruiter_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);

	}

}