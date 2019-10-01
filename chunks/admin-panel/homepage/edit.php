
<?php

include_once '../backend/connection-pdo.php';

$sql = "SELECT * FROM home_table WHERE id = ?";

$query  = $pdoconn->prepare($sql);

$query->execute([$_REQUEST['id']]);

$arr = $query->fetchAll(PDO::FETCH_ASSOC);


$sql = "SELECT * FROM songs_table";

$query  = $pdoconn->prepare($sql);

$query->execute();

$arr_song = $query->fetchAll(PDO::FETCH_ASSOC);


?>
<div class="container">

                <?php 

                if(isset($_SESSION['msg'])){
                    
                    echo '<div class="alert alert-danger" role="alert">'.$_SESSION['msg'].'</div>';

                    unset($_SESSION['msg']);

                }
                 ?>

				<div class="row">
					<div class="col-12 text-center">
						<div class="main-section">
							<h2 class="content-heading">Homepage Song Edit</h2>
                        

<form action="../backend/admin-panel/update-homepage.php?id=<?php echo $_REQUEST['id']; ?>" method="post">

	<?php if (count($arr) > 0) { ?>

	<?php foreach ($arr as $row) {
	 ?>

    <div class="row">

        <div class="col-6">
            <div class="form-group text-left">

                <label for="genre-add">Title</label>
                <input name="name" type="text" class="form-control" id="genre-add" value="<?php echo $row['name'] ?>">
              </div>
        </div>
        <div class="col-6">
            <div class="form-group text-left">

                <label for="genre-artist">Artist Name</label>
                <input value="<?php echo $row['artist'] ?>" name="artist" type="text" class="form-control" id="genre-artist" placeholder="Add a new genre artist">
              </div>
        </div>
        
    </div>

    <div class="row">
    	<div class="col-12">

    		<div class="form-group text-left">
			    <label for="song-menu">Select Song</label>
			    <select name="song" class="form-control" id="song-menu">
			    <?php foreach ($arr_song as $key) {
			    	?>
			      <option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>

			  <?php } ?>
			    </select>
			  </div>

    	</div>
    </div>

    <div class="row">
        <div class="col text-right">

            <button type="submit" class="btn btn-outline-success">Update</button>

            <a href="./homepage-list.php" type="button" class="btn btn-outline-secondary">Dismiss</a>
        </div>
    </div>

<?php }

} else {
	echo '<h4>Sorry! No such records!</h4>';
} ?>
    
</form>

							

						</div>
					</div>
				</div>
			</div>