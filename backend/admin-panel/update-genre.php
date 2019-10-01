<?php
session_start();
require '../connection-pdo.php';

if (!isset($_REQUEST['id'])) {
	$_SESSION['msg'] = "No Parameters!";
	header('location: ../../admin/genre-list.php');
	exit();
}

if (!isset($_POST['name']) || !isset($_POST['desc'])) {
	
	$_SESSION['msg'] = 'Parameters are not set!';
	header('location: ../../admin/genre-list.php');
	exit();
}

if (!preg_match('/^[(a-z)?(A-Z)?(0-9)?\s?\.?\-?*]+$/', $_POST['name'])) {
	
	$_SESSION['msg'] = 'Name field is invalid!';
	header('location: ../../admin/genre-list.php');
	exit();

}

if (!preg_match('/^[(a-z)?(A-Z)?(0-9)?\s?\.?\-?*]+$/', $_POST['desc'])) {
	
	$_SESSION['msg'] = 'Description field is invalid!';
	header('location: ../../admin/genre-list.php');
	exit();

}


$sql = "UPDATE genre_table SET name = ?, description = ? WHERE id = ?";

$query = $pdoconn->prepare($sql);

if ($query->execute([$_POST['name'], $_POST['desc'], $_REQUEST['id']])) {

	$_SESSION['msg'] = "Genre updated successfully!";
	header('location: ../../admin/genre-list.php');

} else {

	$_SESSION['msg'] = "There were some problem! Please try again!";
	header('location: ../../admin/genre-list.php');

}




