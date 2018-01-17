<?php
require "libs/dndsek.php";
require "libs/smarty/Smarty.class.php";

$smarty = new Smarty();

$smarty->caching = false;

$smarty->assign("page_style","default.css");
$smarty->assign("loggedIn",isLoggedIn());
$smarty->assign("page_title","dndsek");

if (isLoggedIn()) {
	$smarty->assign("self",$self);
}

if (isset($_GET['p'])) {
	switch ($_GET['p']) {
		case "login":
			include "login.php";
			break;
		case "users":
			include "users.php";
			break;
		case "map":
			include "map.php";
			break;
		case "settings":
			include "settings.php";
			break;
		case "library":
			include "library.php";
			break;
		default:
			include "404.php";
	}	
} else {
	include "start.php";
}

$smarty->display("index.tpl");
?>