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
	private $image;
	private $license_file;
	private $status = "pending";

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
		$params['image'] = $this->image ?? 'default.jpg';
		$params['license_file'] = $this->license_file ?? null;
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

	function getRecruiters($type = 'list', $status = 'approved') {

		$recruiters = [];

		$sql = "SELECT * FROM $this->table_name  WHERE status = '$status' ";

		if ($type == 'count') {
			$sql = "SELECT COUNT(*) as count FROM $this->table_name WHERE status = '$status' ";
		}

		//debug($sql);

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