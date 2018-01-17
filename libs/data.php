<?php

class Data {
	
	public function getAll() {
		$sql = "SELECT title, data FROM data ORDER BY title ASC";
		$result = $GLOBALS['database']->query($sql);
		$d = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$title = utf8_encode($row['title']);
				$data = utf8_encode($row['data']);
				$d[$title] = $data;
			}
		}
		return $d;
	}

}

?>
