<?php

class Testimonial extends Dbh {

/*

`testimonials` WHERE 1  `id`, `user`, `user_type`, `description`, `status`, `show_in_web`, `created_at`, `updated_at`

 */

	private $id;
	private $user_type;
	private $description;
	private $show_in_web = 'no';
	private $status = 'pending';

	private $table_name = "testimonials";

	function toArray() {
		$params = [];
		$params['user'] = $this->user ?? '';
		$params['user_type'] = $this->user_type ?? '';
		$params['description'] = $this->description ?? '';
		$params['show_in_web'] = $this->show_in_web ?? '';
		$params['status'] = $this->status ?? '';
		return $params;
	}

	function setData($type, $data) {

		switch ($type) {
		case 'user':
			$this->user = $data;
			break;
		case 'user_type':
			$this->user_type = $data;
			break;
		case 'description':
			$this->description = $data;
			break;
		case 'show_in_web':
			$this->show_in_web = $data;
			break;
		case 'status':
			$this->status = $data;
			break;
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
		$top_testimonials = $stmt->fetch();

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

	function createTestimonial() {

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

	function updateTestimonial($id = null) {

		$model_data = set_model_data($this->toArray(), 'update');

		//debug($model_data);

		$params = $model_data['values'];

		$params[] = $id ?? $this->id;

		$sql = "UPDATE $this->table_name SET " . $model_data['feild_assignments'] . " WHERE id = ?";
		$stmt = $this->connect()->prepare($sql);
		//debug($stmt);
		if ($stmt->execute($params)) {
			//return $this->connect()->lastInsertId($this->table_name);
			return true;
		} else {
			debug($this->connect()->errorCode(), false);
			debug($this->connect()->errorInfo());
			return false;
		}

	}

}