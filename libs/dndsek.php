<?php
session_start();

require "general.php";
require "database.php";
require "user.php";
require "data.php";

$database = new Database();
$users = new Users();
$self = getLoggedInUser();
$data = new Data();

global $database;
global $users;
global $self;
global $data;

$database->connect();


?>
