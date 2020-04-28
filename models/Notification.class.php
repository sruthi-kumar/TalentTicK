<?php

class Notification extends Dbh {

	/* `notifications` WHERE 1 `id`, `user`, `title`, `description`, `action_link`, `type`, `status`, `created_at`, `updated_at`*/

	private $user;
	private $title;
	private $description;
	private $action_link;
	private $type = 'info';
	private $status = 'active';

	private $table_name = "notifications";

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

	function getNotifications($limit = null) {

		$notifications = [];

		$sql = "SELECT * FROM $this->table_name WHERE status = active ORDER BY id DESC";
		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$notifications[] = $row;
		}

		return $notifications;

	}

	function getNotificationById($notification_id = null) {

		$this->notification_id = $notification_id ?? $this->notification_id;

		$notification_data = [];

		$sql = "SELECT * FROM $this->table_name WHERE id=?";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->notification_id];
		$stmt->execute($params);
		$notification_data = $stmt->fetch();

		return $notification_data;

	}

	function getNotificationByUser($user = null, $date = null) {

		$this->user = $user ?? $this->user;

		$notification_data = [];

		if (isset($date)) {
			$sql = "SELECT * FROM $this->table_name WHERE created_at=? AND user=? AND status=? ORDER BY id DESC ";
			$params = [Date($date), $this->user, 'active'];
		} else {
			$sql = "SELECT * FROM $this->table_name WHERE user=? AND status=? ";
			$params = [$this->user, 'active'];
		}
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);
		$notification_data = $stmt->fetchAll();

		return $notification_data;

	}

	function createNotification() {

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

	function updateNotification($notification_id = null) {

		$model_data = set_model_data($this->toArray());

		$params = $model_data['values'];

		$params[] = $notification_id ?? $this->notification_id;

		$sql = "UPDATE $this->table_name SET (" . $model_data['fields'] . ") values(" . $model_data['placeholder'] . ") WHERE notification_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($params);

	}

}