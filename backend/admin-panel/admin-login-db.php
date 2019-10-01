<?php
session_start();

require '../connection-pdo.php';

$email = $_POST['email'];

$pass = $_POST['password'];

if (empty($email) || empty($pass)) {
	$_SESSION['msg'] = "Don't leave the fields blank!";
	header("location: ../../admin/index.php");
	exit();
}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$_SESSION['msg'] = "Enter a valid Email Address!";
	header("location: ../../admin/index.php");
	exit();
}

$pass = hash_hmac("sha256", $pass, appSecret);
$sql = "SELECT * FROM admin_table WHERE email = ? AND password = ?";

$query = $pdoconn->prepare($sql);

$query->execute([$email, $pass]);

$arr = $query->fetchAll(PDO::FETCH_ASSOC);


if (count($arr) > 0) {

	$_SESSION['msg'] = "Login was Successful!";

	$_SESSION['admin_token'] = "1";

	header("location: ../../admin/dashboard.php");
	exit();
	

} else {
	

	$_SESSION['msg'] = "Invalid User Credentials!";

	header("location: ../../admin/index.php");
	exit();

}


?>