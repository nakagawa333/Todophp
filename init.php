<?php

session_start();

$_SESSION["user_id"] = 1;

$db = new PDO("mysql:dbname=nakagawa;host=localhost","root","nakagawa3");


if(!isset($_SESSION['user_id'])){
	die("You are not signed in");
}

?>