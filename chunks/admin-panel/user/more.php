<?php
include_once("../backend/connection-pdo.php");

if (isset($_REQUEST['id'])) {

	$sql = "SELECT * FROM users_table WHERE id = ?";

	$query  = $pdoconn->prepare($sql);
	$query->execute([$_REQUEST['id']]);

	$arr_all=$query->fetchAll(PDO::FETCH_ASSOC);

} else {
	$_SESSION['error'] = "No ID Parameter Found!";
	header('location: user-list.php');
}


?>




<div class="container">
<div class="row">
<div class="col-12 text-center">
<div class="main-section">
<h2 class="content-heading">User Details</h2>


<?php 

// session_destroy();

if(isset($_SESSION['error'])){
echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
unset($_SESSION['error']);
}
?>
	

<form method="post" action="../backend/admin/add-songs.php" enctype="multipart/form-data">
	
	<?php foreach ($arr_all as $key) {
		# code...
	   ?>




	<div class="row">
		<div class="col-md-6">
			<div class="form-group text-left">
				<label for="user-name">User Name</label>
				<input type="text" name="name" class="form-control" id="user-name" aria-describedby="user-help" value="<?php echo $key['name']; ?>" disabled>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group text-left">
				<label for="user-email">User Email</label>
				<input type="email" name="email" class="form-control" id="user-email" aria-describedby="user-des-help" value="<?php echo $key['email']; ?>" disabled>
			</div>
		</div>
	</div>


    <div class="row">
		<div class="col-md-6">
			<div class="form-group text-left">
				<label for="user-gender">Gender</label>
				<input type="text" name="gender" class="form-control" id="user-gender" aria-describedby="user-gender-help" value="<?php echo $key['gender']; ?>" disabled>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group text-left">
				<label for="user-artist">Number</label>
				<input type="text" name="artist" class="form-control" id="user-artist" aria-describedby="user-artist-help" value="<?php echo $key['number']; ?>" disabled>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group text-left">
				<label for="song-genre">File Path</label>
				<input type="text" name="genre" class="form-control" id="song-genre" aria-describedby="song-genre-help" value="<?php echo $key['path']; ?>" disabled>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col text-right section-buttons">
			<a href="user-list.php" class="btn btn-outline-success">Dismiss</a>
		</div>
	</div>
	
	<?php } ?>
</form>

</div>
</div>
</div>
</div>