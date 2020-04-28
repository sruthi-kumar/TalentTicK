<?php

include_once __DIR__ . '/../config/database.php';

/**
 *
 */
class Dbh {
	protected $db_host;
	protected $db_user;
	protected $db_password;
	protected $database;
	private $table_name;
	private $id;

	function __construct() {
		$conf = getDbConfig();

		$this->db_host = $conf['db_host'];
		$this->db_user = $conf['db_user'];
		$this->db_password = $conf['db_password'];
		$this->database = $conf['db_name'];
	}

	protected function connect() {
		$dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->database;
		$pdo = new PDO($dsn, $this->db_user, $this->db_password);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		return $pdo;
	}

	protected function set_table_name($table_name) {

		$this->table_name = $table_name;
	}

	function getList() {

		$list = [];

		$sql = "SELECT * FROM $this->table_name ";

		$result = $this->connect()->query($sql);

		while ($row = $result->fetch()) {
			$list[] = $row;
		}

		return $list;

	}

	function create() {

		$model_data = set_model_data($this->toArray());

		$params = $model_data['values'];

		$sql = "INSERT INTO $this->table_name ( " . $model_data['fields'] . " ) values(" . $model_data['placeholder'] . ") ";
		$stmt = $this->connect()->prepare($sql);

		// debug($model_data, false);
		// debug($stmt);

		if ($stmt->execute($params)) {
			//return $this->connect()->lastInsertId($this->table_name);
			return true;
		} else {
			debug($this->connect()->errorCode(), false);
			debug($this->connect()->errorInfo());
			return false;
		}
	}

	function update($id, $id_coloum_name = 'id') {

		$model_data = set_model_data($this->toArray(), 'update');

		//debug($model_data);

		$params = $model_data['values'];

		$params[] = $id;

		$sql = "UPDATE $this->table_name SET " . $model_data['feild_assignments'] . " WHERE $id_coloum_name = ?";
		$stmt = $this->connect()->prepare($sql);

		//debug($model_data, false);
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

/*// Singleton to connect db.
class ConnectDb {
// Hold the class instance.
private static $instance = null;
private $conn;

private $host = 'localhost';
private $user = 'db user-name';
private $pass = 'db password';
private $name = 'db name';

// The db connection is established in the private constructor.
private function __construct()
{
$this->conn = new PDO("mysql:host={$this->host};
dbname={$this->name}", $this->user,$this->pass,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}

public static function getInstance()
{
if(!self::$instance)
{
self::$instance = new ConnectDb();
}

return self::$instance;
}

public function getConnection()
{
return $this->conn;
}
}

$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();
var_dump($conn);
 */