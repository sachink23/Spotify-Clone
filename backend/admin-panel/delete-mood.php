<?php

include_once("../connection-pdo.php");
session_start();

if (isset($_REQUEST['id'])) {


$sql = "SELECT * FROM mood_table WHERE id = ?";

$query  = $pdoconn->prepare($sql);

$query->execute([$_REQUEST['id']]);

$arr_all=$query->fetchAll(PDO::FETCH_ASSOC);


if (count($arr_all) > 0) {

	$sql = "DELETE FROM mood_table WHERE id = ?";

	$query  = $pdoconn->prepare($sql);

	$query->execute([$_REQUEST['id']]);

	$_SESSION['msg'] = "Record Deleted!";
	header('location: ../../admin/mood-list.php');
	
} else {
	$_SESSION['msg'] = "No such Record!";
	header('location: ../../admin/mood-list.php');
}

} else {
	$_SESSION['msg'] = "No ID Parameter to Delete!";
	header('location: ../../admin/mood-list.php');
}