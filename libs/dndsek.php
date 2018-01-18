<?php
session_start();

require "general.php";
require "database.php";
require "user.php";
require "data.php";
require "config.php";

$database = new Database();
$users = new Users();
$self = getLoggedInUser();
$data = new Data();
$config = new Config();

global $database;
global $users;
global $self;
global $data;

$database->connect($config);


?>
