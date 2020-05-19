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

	function __construct() {

		parent::__construct();

		$this->set_table_name($this->table_name);
	}

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

	function getNotifications() {

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

		$sql = "SELECT * FROM $this->table_name WHERE id=?  ORDER BY id DESC";
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

	function delete($notification_id = null) {

		$this->notification_id = $notification_id ?? $this->notification_id;

		$notification_data = [];

		$sql = "UPDATE $this->table_name SET status = 'inactive' WHERE $this->table_name.id = ? ";
		$stmt = $this->connect()->prepare($sql);
		$params = [$this->notification_id];
		return $stmt->execute($params);

	}

}