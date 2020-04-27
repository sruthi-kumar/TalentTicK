<?php

class Testimonial extends Dbh {

	/* `testimonials` WHERE 1 `id`, `user`, `title`, `description`, `action_link`, `type`, `status`, `created_at`, `updated_at`*/

	private $user;
	private $title;
	private $description;
	private $action_link;
	private $type;
	private $status;

	private $table_name = "testimonials";

	function toArray() {
		$params = [];
		$params['user'] = $this->user ?? '';
		$params['title'] = $this->title ?? '';
		$params['description'] = $this->description ?? '';
		$params['action_link'] = $this->action_link ?? '';
		$params['type'] = $this->type ?? '';
		$params['status'] = $this->status ?? '';
		return $params;
	}

	function setData($type, $data) {

		switch ($type) {
		case 'user':
			$this->user = $data;
			break;
		case 'title':
			$this->title = $data;
			break;
		case 'description':
			$this->description = $data;
			break;
		case 'action_link':
			$this->action_link = $data;
			break;
		case 'type':
			$this->type = $data;
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

	function getTestimonialById($testimonial_id = null) {

		$this->testimonial_id = $testimonial_id ?? $this->testimonial_id;

		$testimonial_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->testimonial_id];
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

	function getTestimonialByUser($user = null, $date = null) {

		$this->user = $user ?? $this->user;

		$testimonial_data = [];

		if (isset($date)) {
			$sql = "SELECT * FROM $this->table_name WHERE created_at=? AND user=? AND status=? ORDER BY id DESC ";
			$params = [Date($date), $this->user, 'active'];
		} else {
			$sql = "SELECT * FROM $this->table_name WHERE user=? AND status=? ";
			$params = [$this->user, 'active'];
		}
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);
		$testimonial_data = $stmt->fetchAll();

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

	function updateTestimonial($testimonial_id = null) {

		$model_data = set_model_data($this->toArray());

		$params = $model_data['values'];

		$params[] = $testimonial_id ?? $this->testimonial_id;

		$sql = "UPDATE $this->table_name (" . $model_data['fields'] . ") values(" . $model_data['placeholder'] . ") WHERE testimonial_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);

	}

}