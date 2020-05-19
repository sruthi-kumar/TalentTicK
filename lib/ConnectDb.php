<?php
// Singleton to connect db.
class ConnectDb {
// Hold the class instance.
	private static $instance = null;
	private $conn;

	private function __construct() {

		$conf = getDbConfig();

		$this->db_host = $conf['db_host'];
		$this->db_user = $conf['db_user'];
		$this->db_password = $conf['db_password'];
		$this->database = $conf['db_name'];

		$dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->database;
		$this->conn = new PDO($dsn, $this->db_user, $this->db_password);
		$this->conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
		$this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		return $this->conn;

	}

	public static function getInstance() {
		if (!self::$instance) {
			self::$instance = new ConnectDb();
		}

		return self::$instance;
	}

	public function getConnection() {
		return $this->conn;
	}
}
