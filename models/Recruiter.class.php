<?php

class Recruiter extends Dbh {

	/*
		`users` WHERE 1 `user_id`, `username`, `password`, `type`, `status`, `created_at`, `updated_at`

		`recruiters` WHERE 1  `id`, `user_id`, `company_name`, `email`, `website`, `phone`, `address`, `license`, `city`, `pincode`, `status`, `created_at`, `updated_at`

	*/

	private $id;
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

	function __construct() {

		parent::__construct();

		$this->set_table_name($this->table_name);
	}

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
		case 'id':
			$this->id = $data;
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

	function getRecruiters($type = 'list') {

		$recruiters = [];

		$sql = "SELECT * FROM $this->table_name ";

		if ($type == 'count') {
			$sql = "SELECT COUNT(*) as count FROM $this->table_name   ";
		}
		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$recruiters[] = $row;
		}

		return $recruiters;

	}

	function getRecruiterById($id = null) {

		$this->id = $id ?? $this->id;

		$recruiter_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->id];
		$stmt->execute($params);
		$recruiter_data = $stmt->fetch();

		return $recruiter_data;

	}

	function getRecruiterByUserId($user_id = null) {

		$this->user_id = $user_id ?? $this->user_id;

		$recruiter_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE user_id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->user_id];
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

}