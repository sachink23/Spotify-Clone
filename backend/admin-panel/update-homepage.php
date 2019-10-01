<?php
session_start();
require '../connection-pdo.php';

if (!isset($_REQUEST['id'])) {
	$_SESSION['msg'] = "No Parameters!";
	header('location: ../../admin/homepage-list.php');
	exit();
}

if (!isset($_POST['name']) || !isset($_POST['artist'])) {
	
	$_SESSION['msg'] = 'Parameters are not set!';
	header('location: ../../admin/homepage-list.php');
	exit();
}

if (!preg_match('/^[(a-z)?(A-Z)?(0-9)?\s?\.?\-?*]+$/', $_POST['name'])) {
	
	$_SESSION['msg'] = 'Name field is invalid!';
	header('location: ../../admin/homepage-list.php');
	exit();

}

if (!preg_match('/^[(a-z)?(A-Z)?(0-9)?\s?\.?\-?*]+$/', $_POST['artist'])) {
	
	$_SESSION['msg'] = 'Artist field is invalid!';
	header('location: ../../admin/homepage-list.php');
	exit();
}


$sql = "UPDATE home_table SET name = ?, artist = ?, song_id = ? WHERE id = ?";

$query = $pdoconn->prepare($sql);

if ($query->execute([$_POST['name'], $_POST['artist'], $_POST['song'], $_REQUEST['id']])) {

	$_SESSION['msg'] = "Homepage songs updated successfully!";
	header('location: ../../admin/homepage-list.php');

} else {

	$_SESSION['msg'] = "There were some problem! Please try again!";
	header('location: ../../admin/homepage-list.php');

}




