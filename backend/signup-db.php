<?php

session_start();

include_once("./connection-pdo.php");


if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['gender'])) {

	$name=$_POST['name'];
	$email=$_POST['email'];
	$password= hash_hmac("sha256", $_POST['password'], appSecret);
	$gender=$_POST['gender'];
	$number=$_POST['number'];

	if (!preg_match('/^[(a-z)?(A-Z)?\d?\s?]+$/', $name)) {
		
		$_SESSION['msg'] = 'Invalid Name';
		header('location: ../signup.php');
		exit();
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		
		$_SESSION['msg'] = 'Invalid Email Address';
		header('location: ../signup.php');
		exit();
	}

	if (($_POST['gender'] != 'Male') && ($_POST['gender'] != 'Female') && ($_POST['gender'] != 'Not Listed')) {
		
		$_SESSION['msg'] = 'Invalid Gender Selected';
		header('location: ../signup.php');
		exit();
	}

	$sql = "INSERT INTO users_table (name, email, password, gender, number) VALUES (?, ?, ?, ?, ?)";


	$query  = $pdoconn->prepare($sql);
	$query->execute([$name, $email, $password, $gender, $number]);

	$_SESSION['msg'] = 'Account Created Successfully! Now <a href="./login.php" style="color: green;">Log In</a> to your account!';
	header('location: ../signup.php');


} else {

	$_SESSION['msg'] = 'Invalid Parameters!';
	header('location: ../signup.php');
	exit();

}





?>