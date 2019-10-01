<?php
session_start();
include '../connection-pdo.php';

if (!isset($_POST['_id']) || !isset($_POST['name']) || !isset($_POST['desc']) || !isset($_POST['length']) || !isset($_POST['artist']) || !isset($_POST['genre']) || !isset($_POST['mood'])) {
	
	$_SESSION['msg'] = "Parameters are missing!";
	header('location: ../../admin/song-list.php');
	exit();
}

if (!isset($_FILES['file']) || ($_FILES['file']['tmp_name'] == "")) {


	if (!preg_match('/^[(a-z)?(A-Z)?(0-9)?\s?\.?\-?*]+$/', $_POST['name'])) {
	
		$_SESSION['msg'] = 'Name field is invalid!';
		header('location: ../../admin/song-edit.php?id='.$_POST['_id']);
		exit();

	}

	if (!preg_match('/^[(a-z)?(A-Z)?(0-9)?\s?\.?\-?*]+$/', $_POST['desc'])) {
		
		$_SESSION['msg'] = 'Description field is invalid!';
		header('location: ../../admin/song-edit.php?id='.$_POST['_id']);
		exit();

	}

	if (!preg_match('/^\d{2}:\d{2}$/', $_POST['length'])) {
		
		$_SESSION['msg'] = 'Song Length field is invalid!';
		header('location: ../../admin/song-edit.php?id='.$_POST['_id']);
		exit();

	}

	$sid = $_POST['_id'];

	$name = $_POST['name'];

	$description = $_POST['desc'];

	$length = $_POST['length'];

	$artist = $_POST['artist'];

	$genre = $_POST['genre'];

	$mood = $_POST['mood'];


	$sql = "UPDATE songs_table SET name = ?, description = ?, length = ?, artist_id = ?, genre_id = ?, mood_id = ? WHERE id = ?";

	$query = $pdoconn->prepare($sql);

	if ($query->execute([$name, $description, $length, $artist, $genre, $mood, $sid])) {

		$_SESSION['msg'] = "Song updated successfully!";
		header('location: ../../admin/song-list.php');

	} else {

		$_SESSION['msg'] = "There were some problem! Please try again!";
		header('location: ../../admin/song-list.php');

	}
	



} else {

	$fileTmpPath = $_FILES['file']['tmp_name'];

	$fileName = $_FILES['file']['name'];

	$fileSize= $_FILES['file']['size'];

	$fileType = $_FILES['file']['type'];

	$file_name_arr = explode(".", $fileName);

	$fileExtension = strtolower(end($file_name_arr));


	$allowed_extensions = array('mp3', 'wav');

	if (!in_array($fileExtension, $allowed_extensions)) {
		$_SESSION['msg'] = "Invalid File Type!";
		header('location: ../../admin/song-edit.php?id='.$_POST['_id']);
		exit();
	}


	$sql = "SELECT path FROM songs_table WHERE id = ?";

	$query  = $pdoconn->prepare($sql);

	$query->execute([$_POST['_id']]);

	$arr = $query->fetchAll(PDO::FETCH_ASSOC);


	foreach ($arr as $key) {

		$fileToDelete = $key['path'];
	}

	if (file_exists('../../'.$fileToDelete)) {

		unlink('../../'.$fileToDelete);
		
	}

	$uploadFileDir = __DIR__ . '/../../files/songs/';

	$trimmed_file_name = str_replace(" ", "", $fileName);

	$dest_path = $uploadFileDir . $trimmed_file_name;


	if (move_uploaded_file($fileTmpPath, $dest_path)) {

		$tmp_id = $_POST['_id'];

		$sql = "UPDATE songs_table SET path = ? WHERE id = ?";

		$query  = $pdoconn->prepare($sql);

		if ($query->execute(['files/songs/'.$trimmed_file_name, $tmp_id])) {
			$msg = "File is succesfully uploaded. Record updated!";
		} else {

			$msg = "There were some problems in uploading the file.";
		}

	} else {
		$msg = "There were some problem! Try again later!";
	}

	$_SESSION['msg'] = $msg;
	header('location: ../../admin/song-edit.php?id='.$_POST['_id']);
    exit();

}
















