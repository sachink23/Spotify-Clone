
<?php
session_start();
include_once("./connection-pdo.php");



if (isset($_POST['cpass']) && isset($_POST['npass']) && isset($_POST['conpass'])) {

	$cpass=$_POST['cpass'];
	$npass=$_POST['npass'];
	$conpass=$_POST['conpass'];


	$sql = "SELECT * FROM users_table WHERE password = ? AND id = ?";


	$query  = $pdoconn->prepare($sql);
	$query->execute([$cpass, $_SESSION['user_id']]);
	$arr_data=$query->fetchAll(PDO::FETCH_ASSOC);

	if (count($arr_data) <= 0) {
		
		$_SESSION['msg'] = 'Invalid Current Password!';
		header('location: ../account/edit-password.php');
		exit();
	}

	if ($npass != $conpass) {
		
		$_SESSION['msg'] = "Passwords doesn't match";
		header('location: ../account/edit-password.php');
		exit();
	}


	$sql = "UPDATE users_table SET password = ? WHERE id = ?";


	$query  = $pdoconn->prepare($sql);
	$query->execute([$npass, $_SESSION['user_id']]);

	$_SESSION['msg'] = 'Password Updated!';
	header('location: ../account/');


} else {

	$_SESSION['msg'] = 'Invalid Parameters!';
	header('location: ../account/edit-password.php');
	exit();

}