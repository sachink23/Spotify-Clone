<?php
session_start();
include '../connection-pdo.php';


if (!isset($_POST['name']) || !isset($_POST['desc']) || !isset($_POST['length']) || !isset($_POST['artist']) || !isset($_POST['genre']) || !isset($_POST['mood']) || !isset($_FILES['file']) ) {
	
	$_SESSION['msg'] = 'Parameters are missing!';
	header('location: ../../admin/song-add.php');

	exit();
}

if (!preg_match('/^[(a-z)?(A-Z)?(0-9)?\s?\.?\-?*]+$/', $_POST['name'])) {
	
	$_SESSION['msg'] = 'Name field is invalid!';
	header('location: ../../admin/song-add.php');
	exit();

}

if (!preg_match('/^[(a-z)?(A-Z)?(0-9)?\s?\.?\-?*]+$/', $_POST['desc'])) {
	
	$_SESSION['msg'] = 'Description field is invalid!';
	header('location: ../../admin/song-add.php');
	exit();

}

if (!preg_match('/^\d{2}:\d{2}$/', $_POST['length'])) {
	
	$_SESSION['msg'] = 'Song Length field is invalid!';
	header('location: ../../admin/song-add.php');
	exit();

}


$fileTmpPath = $_FILES['file']['tmp_name'];

$fileName = $_FILES['file']['name'];

$fileSize= $_FILES['file']['size'];

$fileType = $_FILES['file']['type'];

$file_name_arr = explode(".", $fileName);

$fileExtension = strtolower(end($file_name_arr));


$allowed_extensions = array('mp3', 'wav');

if (!in_array($fileExtension, $allowed_extensions)) {
	$_SESSION['msg'] = "Invalid File Type!";
	header('location: ../../admin/song-add.php');
	exit();
}

date_default_timezone_set('Asia/Calcutta');

$name = $_POST['name'];

$description = $_POST['desc'];

$length = $_POST['length'];

$artist = $_POST['artist'];

$genre = $_POST['genre'];

$mood = $_POST['mood'];


$timest = date('Y-m-d H:i:s');

$sql = "INSERT INTO songs_table (name, description, length, artist_id, genre_id, mood_id, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?)";

$query  = $pdoconn->prepare($sql);


if ($query->execute([$name, $description, $length, $artist, $genre, $mood, $timest])) {

	$uploadFileDir = __DIR__ . '/../../files/songs/';

	$trimmed_file_name = str_replace(" ", "", $fileName);

	$dest_path = $uploadFileDir . $trimmed_file_name;

	if (move_uploaded_file($fileTmpPath, $dest_path)) {
		
		$tmp_id = $pdoconn->lastInsertId();

		$sql = "UPDATE songs_table SET path = ? WHERE id = ?";

		$query  = $pdoconn->prepare($sql);

		if ($query->execute(['files/songs/'.$trimmed_file_name, $tmp_id])) {
			$msg = "File is succesfully uploaded. Record Inserted!";
		} else {

			$msg = "There were some problems in uploading the file.";
		}



	} else {

		$msg = "There were some problem! Try again later!";

	}

	$_SESSION['msg'] = $msg;
	header('location: ../../admin/song-add.php');
    exit();


	# code...
} else {

	$_SESSION['msg'] = "There was an Internal Server Error! Please try aagain!";
    header('location: ../../admin/song-add.php');
    exit();

}















