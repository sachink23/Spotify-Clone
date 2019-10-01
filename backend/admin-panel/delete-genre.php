

<?php
session_start();

include_once("../connection-pdo.php");

if (!isset($_REQUEST['id'])) {

	$_SESSION['msg'] = "Parameters are not set!";
	header('location: ../../admin/genre-list.php');
}


$sql = "DELETE FROM genre_table WHERE id = ?";

$query  = $pdoconn->prepare($sql);

if ($query->execute([$_REQUEST['id']])) {

	$_SESSION['msg'] = "Record Deleted Successfully!";
	header('location: ../../admin/genre-list.php');
	
} else {
	$_SESSION['msg'] = "There were some problem! Try again later!";
	header('location: ../../admin/genre-list.php');
}













