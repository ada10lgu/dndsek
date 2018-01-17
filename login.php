<?php
$action = isset($_GET['a']) ? $_GET['a'] : "";


if ($action == "logout") {
	$users->logout();
	header("Location: ./");
}

if (isLoggedIn()) {
	header("Location: ./");
}

if ($action == "" && isPost(array('username','password'))) {
	$_SESSION['loggedIn'] = $users->login($_POST['username'],$_POST['password']);
	if (!isLoggedIn()) {
		$smarty->assign("error","Could not log in");
	} else {
		header("Location: ./");
	}
} else if ($action == "signup" && isPost(array('username','password','password2','email'))) {
	if ($_POST['password'] != $_POST['password2']) {
		$smarty->assign("error","Passwords don't match");
	} else {
		$error = $users->createUser($_POST['username'],$_POST['password'],$_POST['email']);
		if ($error != null) {
			$smarty->assign("error",$error);
		} else {
			header("Location: ./");
		}	
	}	
}


$page = "login.tpl";
switch ($action) {
	case "signup":
		$page = "signup.tpl";
		break;
}

$smarty->assign("page",$page);
?>
