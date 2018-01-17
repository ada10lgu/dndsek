<?php
function isPost($var) {
	if (is_array($var)) {
		foreach ($var as $v) {
			if (!isset($_POST[$v]))
				return false;
		}
		return true;
	}
	return isset($_POST[$var]);
}


function isGet($var) {
	if (is_array($var)) {
		foreach ($var as $v) {
			if (!isset($_GET[$v]))
				return false;
		}
		return true;
	}
	return isset($_GET[$var]);
}

function getLoggedInUser() {
	return $_SESSION['user'];
}

function isLoggedIn() {
	return getLoggedInUser() != null;
}

?>
