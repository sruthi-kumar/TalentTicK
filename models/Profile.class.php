<?php

class Profile extends Dbh {

	/*
		 SELECT * FROM `profiles` WHERE 1 `id`, `student_id`, `dob`, `address`, `addressline2`, `state_id`, `district_id`, `pincode`, `cgpa`, `gpg`, `gug`, `gplus`, `g10`, `backlogs`, `sslc_certificate`, `highersecondary_certificate`, `resume`, ` `

	*/

	private $id;
	private $student_id;
	private $dob;
	private $state_id;
	private $district_id;
	private $address;
	private $addressline2;
	private $pincode;
	private $cgpa;
	private $gpg;
	private $gug;
	private $gplus;
	private $g10;
	private $backlogs;
	private $sslc_certificate;
	private $highersecondary_certificate;
	private $resume;

	private $table_name = "profiles";

	function __construct() {

		parent::__construct();

		$this->set_table_name($this->table_name);
	}

	function toArray() {
		$params = [];
		$params['student_id'] = $this->student_id ?? '';
		$params['dob'] = $this->dob ?? '';
		$params['state_id'] = $this->state_id ?? '';
		$params['district_id'] = $this->district_id ?? '';
		$params['address'] = $this->address ?? '';
		$params['addressline2'] = $this->addressline2 ?? '';
		$params['pincode'] = $this->pincode ?? '';
		$params['cgpa'] = $this->cgpa ?? '';
		$params['gpg'] = $this->gpg ?? '';
		$params['gug'] = $this->gug ?? '';
		$params['gplus'] = $this->gplus ?? '';
		$params['g10'] = $this->g10 ?? '';
		$params['backlogs'] = $this->backlogs ?? '';
		$params['sslc_certificate'] = $this->sslc_certificate ?? '';
		$params['highersecondary_certificate'] = $this->highersecondary_certificate ?? '';
		$params['resume'] = $this->resume ?? '';
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

	function getProfileByStudentId($student_id = null) {

		$this->student_id = $student_id ?? $this->student_id;

		$recruiter_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE student_id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->student_id];
		$stmt->execute($params);
		$recruiter_data = $stmt->fetch();

		return $recruiter_data;

	}

}