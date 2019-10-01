<?php

include '../connection-pdo.php';

session_start();


if (!isset($_REQUEST['id'])) {
	$_SESSION['msg'] = 'Parameters were missing!';
	header('location: ../../admin/song-list.php');
	exit();
}

$sql = "SELECT path FROM songs_table WHERE id = ?";

$query  = $pdoconn->prepare($sql);

$query->execute([$_REQUEST['id']]);

$arr = $query->fetchAll(PDO::FETCH_ASSOC);


foreach ($arr as $key) {

	$fileToDelete = $key['path'];
}

if (file_exists('../../'.$fileToDelete)) {
	
	unlink('../../'.$fileToDelete);


	$sql = "DELETE FROM songs_table WHERE id = ?";
	$query  = $pdoconn->prepare($sql);

	if ($query->execute([$_REQUEST['id']])) {
		$_SESSION['msg'] = "File is deleted! Record cleared!";
	} else {
		$_SESSION['msg'] = "There were some problem! Try again!";
	}

	header('location: ../../admin/song-list.php');
	exit();

} else {

	$sql = "DELETE FROM songs_table WHERE id = ?";
	$query  = $pdoconn->prepare($sql);

	if ($query->execute([$_REQUEST['id']])) {
		$_SESSION['msg'] = "File is already deleted! Record cleared!";
	} else {
		$_SESSION['msg'] = "There were some problem! Try again!";
	}

	header('location: ../../admin/song-list.php');
	exit();


}





























