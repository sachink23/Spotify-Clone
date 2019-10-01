<?php
session_start();
include_once("./connection-pdo.php");



if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['number'])) {

	$name=$_POST['name'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$number=$_POST['number'];

	if (!preg_match('/^[(a-z)?(A-Z)?\d?\s?]+$/', $name)) {
		
		$_SESSION['msg'] = 'Invalid Name';
		header('location: ../account/edit-profile.php');
		exit();
	}

	if (!preg_match('/^[0-9]+$/', $number)) {
		
		$_SESSION['msg'] = 'Invalid Number';
		header('location: ../account/edit-profile.php');
		exit();
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		
		$_SESSION['msg'] = 'Invalid Email Address';
		header('location: ../account/edit-profile.php');
		exit();
	}

	if (($_POST['gender'] != 'Male') && ($_POST['gender'] != 'Female') && ($_POST['gender'] != 'Not Listed')) {
		
		$_SESSION['msg'] = 'Invalid Gender Selected';
		header('location: ../account/edit-profile.php');
		exit();
	}

	$sql = "UPDATE users_table SET name = ?, email = ?, gender = ?, number = ? WHERE id = ?";


	$query  = $pdoconn->prepare($sql);
	$query->execute([$name, $email, $gender, $number, $_SESSION['user_id']]);

	$_SESSION['msg'] = 'Profile Updated!';
	header('location: ../account/');


} else {

	$_SESSION['msg'] = 'Invalid Parameters!';
	header('location: ../account/edit-profile.php');
	exit();

}