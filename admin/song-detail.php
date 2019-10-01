<?php require('../chunks/admin-panel/layout/header.php'); ?>


<?php

if (!isset($_REQUEST['id'])) {
	$_SESSION['msg'] = "No Parameters!";
	header('location: ./song-list.php');
	exit();
}

?>

<?php require('../chunks/admin-panel/layout/sidenav.php'); ?>

    <div id="content">

        <?php require('../chunks/admin-panel/layout/topnav.php'); ?>

        <?php require('../chunks/admin-panel/songs/detail.php'); ?>

    </div>

<?php require('../chunks/admin-panel/layout/bottom.php'); ?>