<?php
class Database {

	private $conn;


	public function connect($config) {
		
		$this->conn = new mysqli($config->database_server, $config->database_user, $config->database_password,$config->database_db);

		if ($this->conn->connect_error) {
			return false;			
		}

		return true;
	}	

	public function close() {
		$this->conn->close();
	}

	public function query($sql) {
		$params = func_get_args();
		array_shift($params);

		foreach ($params AS &$param) {
			$param = $this->conn->escape_string($param);
		}

		$sql = str_replace('%', '%%', $sql);
    	$sql = str_replace('?', '\'%s\'', $sql);

		$formatedSql = vsprintf($sql,$params);
		$result = $this->conn->query($formatedSql);

		if ($result === false &&  isset($_SESSION['user']) && $_SESSION['user']['admin']) {
			echo "<p>\n<font  color='red'>\n";
			echo $this->conn->error;
			echo "<br />\n";
			echo $formatedSql;
			echo "</font>\n</p>\n";
		}
		return $result;	
	}
}

?>
