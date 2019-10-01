<?php
session_start();
require '../connection-pdo.php';


if (!isset($_POST['name']) || !isset($_POST['desc'])) {
	
	$_SESSION['msg'] = 'Parameters are not set!';
	header('location: ../../admin/genre-add.php');
	exit();
}

if (!preg_match('/^[(a-z)?(A-Z)?(0-9)?\s?\.?\-?*]+$/', $_POST['name'])) {
	
	$_SESSION['msg'] = 'Name field is invalid!';
	header('location: ../../admin/genre-add.php');
	exit();

}

if (!preg_match('/^[(a-z)?(A-Z)?(0-9)?\s?\.?\-?*]+$/', $_POST['desc'])) {
	
	$_SESSION['msg'] = 'Description field is invalid!';
	header('location: ../../admin/genre-add.php');
	exit();

}

date_default_timezone_set('Asia/Kolkata');

$date = date('d-m-Y h:i:s');

$sql = "INSERT INTO genre_table (name, description, timestamp) VALUES (?, ?, ?)";

$query = $pdoconn->prepare($sql);

if ($query->execute([$_POST['name'], $_POST['desc'], $date])) {
	$_SESSION['msg'] = "Genre added successfully!";
	header('location: ../../admin/genre-add.php');
} else {

	$_SESSION['msg'] = "There were some problem! Please try again!";
	header('location: ../../admin/genre-add.php');

}







