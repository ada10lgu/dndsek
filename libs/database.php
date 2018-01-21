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
		//echo '<p><font color="red">query "'.$sql.'"</font></p>';
		return $this->conn->query($sql);	
	}

}

?>
