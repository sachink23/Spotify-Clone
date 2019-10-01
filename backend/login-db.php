<?php
session_start();
include_once("./connection-pdo.php");



if (!isset($_POST['email']) || !isset($_POST['password'])) {

	$_SESSION['msg']="Invalid Parameters!";
    header('location: ../login.php');
}

$username=$_POST['email'];
$password= hash_hmac("sha256", $_POST['password'], appSecret);



if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
		
		$_SESSION['msg'] = 'Invalid Email Address';
		header('location: ../login.php');
		exit();
	}


$sql = "SELECT * FROM users_table WHERE email = ? AND password = ?";

$query  = $pdoconn->prepare($sql);
$query->execute([$username, $password]);
$arr_login=$query->fetchAll(PDO::FETCH_ASSOC);


if(count($arr_login) > 0)
{

	foreach ($arr_login as $key) {
		$tmp_username = $key['name'];
		$tmp_id = $key['id'];
	}



    
    $_SESSION['user'] = $tmp_username;
    $_SESSION['user_id'] = $tmp_id;
    header('location: ../');
}
else
{
    $_SESSION['msg']="Invalid Credentials!";
    header('location: ../login.php');
}



?>