<?php

include_once '../backend/connection-pdo.php';

$sql = "SELECT * FROM songs_table WHERE id = ?";

$query  = $pdoconn->prepare($sql);

$query->execute([$_REQUEST['id']]);

$arr_song = $query->fetchAll(PDO::FETCH_ASSOC);



$sql = "SELECT * FROM artist_table";

$query = $pdoconn->prepare($sql);

$query->execute();

$arr_artist = $query->fetchAll(PDO::FETCH_ASSOC);


$sql = "SELECT * FROM genre_table";

$query = $pdoconn->prepare($sql);

$query->execute();

$arr_genre = $query->fetchAll(PDO::FETCH_ASSOC);


$sql = "SELECT * FROM mood_table";

$query = $pdoconn->prepare($sql);

$query->execute();

$arr_mood = $query->fetchAll(PDO::FETCH_ASSOC);


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
							<h2 class="content-heading">Edit Song Data</h2>
                        

<form action="../backend/admin-panel/update-song.php" method="post" enctype='multipart/form-data'>

    <?php if (count($arr_song) > 0) { ?>

    <?php foreach ($arr_song as $key) {  ?>

    <input type="hidden" name="_id" value="<?php echo $key['id']; ?>">

    <div class="row">

        <div class="col-6">
            <div class="form-group text-left">

                <label for="song-add">Song Name</label>
                <input value="<?php echo $key['name']; ?>" name="name" type="text" class="form-control" id="song-add" placeholder="Add a new song">
              </div>
        </div>
        <div class="col-6">
            <div class="form-group text-left">

                <label for="song-description">Song Description</label>
                <input value="<?php echo $key['description']; ?>" name="desc" type="text" class="form-control" id="song-description" placeholder="Add a new song description">
              </div>
        </div>
        
    </div>

    <div class="row">
    	<div class="col-6">
			<div class="form-group text-left">

                <label for="song-length">Song Length</label>
                <input value="<?php echo $key['length']; ?>" name="length" type="text" class="form-control" id="song-length" placeholder="Add the song length">
              </div>
    	</div>
    	<div class="col-6">

    		<div class="form-group text-left">
			    <label for="artist-menu">Select Artist</label>
			    <select name="artist" class="form-control" id="artist-menu">
			    <?php foreach ($arr_artist as $row) {
			    	?>
			      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

			  <?php } ?>
			    </select>
			  </div>

    	</div>
    </div>

    <div class="row">
    	<div class="col-6">

    		<div class="form-group text-left">
			    <label for="genre-menu">Select Genre</label>
			    <select name="genre" class="form-control" id="genre-menu">
			    <?php foreach ($arr_genre as $row) {
			    	?>
			      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

			  <?php } ?>
			    </select>
			  </div>
			
    	</div>
    	<div class="col-6">
			
			<div class="form-group text-left">
			    <label for="mood-menu">Select Mood</label>
			    <select name="mood" class="form-control" id="mood-menu">
			    <?php foreach ($arr_mood as $row) {
			    	?>
			      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

			  <?php } ?>
			    </select>
			  </div>

    	</div>
    </div>

    <div class="row">
    	<div class="col-12 file_upload_song">

    		<h6>Upload Song</h6>

    		<div class="input-group mb-3">
			  <div class="custom-file">
			    <input name="file" type="file" class="custom-file-input" id="song_file">
			    <label class="custom-file-label" for="song_file" aria-describedby="inputGroupFileAddon02">Choose file</label>
			  </div>
			</div>


    	</div>
    </div>

    <div class="row">
        <div class="col text-right">

            <button type="submit" class="btn btn-outline-success">Submit</button>

            <a href="./song-list.php" type="button" class="btn btn-outline-secondary">Dismiss</a>
        </div>
    </div>
    <?php } ?>

<?php } else {
    echo '<h6>No such song exist!</h6>';
} ?>
</form>

							

						</div>
					</div>
				</div>
			</div>