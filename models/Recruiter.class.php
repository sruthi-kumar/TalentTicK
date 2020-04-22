<?php

class Recruiter extends Dbh {

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

	function setRecruiterData($type, $data) {

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
			$recruiter[] = $row;
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

/* recruiter_id ,  user_id ,  company_name ,  email ,  website ,  phone ,  address ,  license ,  city ,  pincode*/

		$params = [];
		$params[] = $this->user_id;
		$params[] = $this->company_name;
		$params[] = $this->email;
		$params[] = $this->website;
		$params[] = $this->phone;
		$params[] = $this->address;
		$params[] = $this->license;
		$params[] = $this->city;
		$params[] = $this->pincode;

		$sql = "INSERT INTO $this->table_name ( user_id,  company_name ,  email ,  website ,  phone ,  address ,  license ,  city ,  pincode ) values(?,?,?,?,?,?,?,?,?)";
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

		$params = [];
		$params[] = $this->user_id;
		$params[] = $this->company_name;
		$params[] = $this->email;
		$params[] = $this->website;
		$params[] = $this->phone;
		$params[] = $this->address;
		$params[] = $this->license;
		$params[] = $this->city;
		$params[] = $recruiter_id ?? $this->recruiter_id;

		$sql = "UPDATE $this->table_name ( user_id,  company_name ,  email ,  website ,  phone ,  address ,  license ,  city ,  pincode ) values(?,?,?,?,?,?,?,?,?) WHERE recruiter_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);

	}

}