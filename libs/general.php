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
	return isset($_SESSION['user']) ? $_SESSION['user'] : null;
}

function isLoggedIn() {
	return getLoggedInUser() != null;
}

function verifyAccess() {
	if (!isLoggedIn())
		header("Location: ./?p=404");
}

?>
