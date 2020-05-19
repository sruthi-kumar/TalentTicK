<?php

class Testimonial extends Dbh {

/*

`testimonials` WHERE 1  `id`, `user`, `user_type`, `description`, `status`, `show_in_web`, `created_at`, `updated_at`

 */

	private $id;
	private $user;
	private $user_type;
	private $description;
	private $show_in_web = 'no';
	private $status = 'pending';
	private $table_name = "testimonials";

	function __construct() {

		parent::__construct();

		$this->set_table_name($this->table_name);
	}

	function toArray() {
		$params = [];
		$params['user'] = $this->user ?? '';
		$params['user_type'] = $this->user_type ?? '';
		$params['description'] = $this->description ?? '';
		$params['show_in_web'] = $this->show_in_web ?? '';
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

	function getTestimonials($type = 'list') {

		$testimonials = [];

		$sql = "SELECT * FROM $this->table_name ";

		if ($type == 'count') {
			$sql = "SELECT COUNT(*) as count FROM $this->table_name   ";
		}

		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$testimonials[] = $row;
		}

		return $testimonials;

	}

	function getTestimonialById($id = null) {

		$this->id = $id ?? $this->id;

		$testimonial_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->id];
		$stmt->execute($params);
		$testimonial_data = $stmt->fetch();

		return $testimonial_data;

	}

	function getTopTestimonials() {

		$top_testimonials = [];

		$sql = "SELECT * FROM $this->table_name WHERE show_in_web=?";
		$stmt = $this->connect()->prepare($sql);
		$params = ['yes'];
		$stmt->execute($params);
		$top_testimonials = $stmt->fetchAll();

		return $top_testimonials;

	}

	function getTestimonialByUser($user = null) {

		$this->user = $user ?? $this->user;

		$testimonial_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE user=?";
		$params = [$this->user];

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);
		$testimonial_data = $stmt->fetch();

		return $testimonial_data;

	}

}