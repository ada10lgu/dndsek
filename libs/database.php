<?php
class Database {

	private $conn;


	public function connect() {
		$this->conn = new mysqli("localhost", "dndsek", "tiamat","dndsek");

		if ($this->conn->connect_error) {
			return false;			
		}

		return true;
	}	

	public function close() {
		$this->conn->close();
	}

	public function query($sql) {
//		echo '<p>query "'.$sql.'"</p>';
		return $this->conn->query($sql);	
	}

}

?>
