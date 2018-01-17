<?php

class Users {
	
	public function login($username, $password) {
		$username = trim($username);
		$sql = "SELECT username, email, hash, accepted, admin FROM users WHERE username = '".$username."' AND accepted < CURRENT_TIMESTAMP() LIMIT 1";	
		$result = $GLOBALS['database']->query($sql);		
		$u = null;
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$hash = $row['hash'];
			if (password_verify($password,$hash)) {
				$u = new User($row['username'],$row['email'],$row['accepted'],$row['admin']);
				$_SESSION['user']['username'] = $u->username;
				$_SESSION['user']['admin'] = (boolean) $u->admin;	
			} 		
		}

		return $u;
	}

	public function logout() {
		if (!isLoggedIn())
			return;
		$_SESSION['user']  = null;
	}

	public function createUser($username, $password, $email) {
		$username = trim($username);		
		if (strlen($username) < 4) 
			return "Username to short";		
		if (strlen($password) < 4)
			return "Password to short";
		if (!filter_var($email,FILTER_VALIDATE_EMAIL))
			return "Email is malformed";

		$sql = "SELECT id FROM users WHERE username = '".$username."' LIMIT 1";
		$result = $GLOBALS['database']->query($sql);
		if ($result->num_rows > 0)
			return "Username is taken";

		$sql = "SELECT id FROM users WHERE email = '".$email."' LIMIT 1";
		$result = $GLOBALS['database']->query($sql);
		if ($result->num_rows > 0)
			return "Email is used";

		$hash = password_hash($password,PASSWORD_DEFAULT);
		$sql = "INSERT INTO users(username, hash, email) VALUES ('".$username."','".$hash."','".$email."')";
		$result = $GLOBALS['database']->query($sql);
	}
	
	public function getUsers() {
		$sql = "SELECT username, email, accepted, admin FROM users ORDER BY username ASC";
		$result = $GLOBALS['database']->query($sql);
		
		$users = array();
		
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$users[] = new User($row['username'],$row['email'],$row['accepted'],$row['admin']);
			}

		}

		return $users;
	}

}

class User {
	public $username;
	public $email;
	public $accepted;
	public $admin;

	function __construct($username, $email,$accepted,$admin) {
		$this->username = $username;
		$this->email = $email;
		$this->accepted = $accepted;
		$this->admin = $admin;
	}
}

?>