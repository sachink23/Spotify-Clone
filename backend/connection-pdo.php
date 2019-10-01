

<?php


include_once 'config.php';

try {

	$pdoconn = new PDO("mysql:host=$host; dbname=$database", $user, $pwd, array( PDO::ATTR_PERSISTENT => true ));

	$pdoconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

	die("Can not Access DB : ".$database." , ".$e->getMessage());
}







