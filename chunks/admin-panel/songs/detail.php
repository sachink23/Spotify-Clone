

<?php

include_once '../backend/connection-pdo.php';

$sql = "SELECT songs_table.id, songs_table.path, songs_table.name AS sname, songs_table.description, songs_table.length, artist_table.name AS aname, genre_table.name AS gname, mood_table.name AS mname FROM songs_table LEFT JOIN artist_table ON songs_table.artist_id = artist_table.id LEFT JOIN genre_table ON songs_table.genre_id = genre_table.id LEFT JOIN mood_table ON songs_table.mood_id = mood_table.id WHERE songs_table.id = ?";

$query = $pdoconn->prepare($sql);

$query->execute([$_REQUEST['id']]);

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
							<h2 class="content-heading">Song Detail</h2>
                        

<form action="../backend/admin-panel/add-song.php" method="post" enctype='multipart/form-data'>

	<?php if (count($arr_song) > 0) { ?>
	<?php foreach ($arr_song as $row) { ?>

    <div class="row">

        <div class="col-6">
            <div class="form-group text-left">

                <label for="song-add">Song Name</label>
                <input name="name" value="<?php echo $row['sname']; ?>" type="text" class="form-control" id="song-add" disabled>
              </div>
        </div>
        <div class="col-6">
            <div class="form-group text-left">

                <label for="song-description">Song Description</label>
                <input value="<?php echo $row['description']; ?>" name="desc" type="text" class="form-control" id="song-description" disabled>
              </div>
        </div>
        
    </div>

    <div class="row">
    	<div class="col-6">
			<div class="form-group text-left">

                <label for="song-length">Song Length</label>
                <input value="<?php echo $row['length']; ?>" name="length" type="text" class="form-control" id="song-length" disabled>
              </div>
    	</div>
    	<div class="col-6">

    		<div class="form-group text-left">
			    <label for="artist-menu">Artist</label>
			    <input value="<?php echo $row['aname']; ?>" name="artist" type="text" class="form-control" id="song-artist" disabled>
			  </div>

    	</div>
    </div>

    <div class="row">
    	<div class="col-6">

    		<div class="form-group text-left">
			    <label for="genre-menu">Genre</label>
			    <input value="<?php echo $row['gname']; ?>" name="genre" type="text" class="form-control" id="song-genre" disabled>
			  </div>
			
    	</div>
    	<div class="col-6">
			
			<div class="form-group text-left">
			    <label for="mood-menu">Mood</label>
			    <input value="<?php echo $row['mname']; ?>" name="mood" type="text" class="form-control" id="song-mood" disabled>
			  </div>

    	</div>
    </div>

    <div class="row">
    	<div class="col-12 file_upload_song">

    		<div class="form-group text-left">
			    <label for="path-menu">File Path</label>
			    <input value="<?php echo $row['path']; ?>" name="path" type="text" class="form-control" id="song-path" disabled>
			  </div>


    	</div>
    </div>

    <div class="row">
        <div class="col text-right">

            <a href="./song-edit.php?id=<?php echo $_REQUEST['id']; ?>" class="btn btn-outline-success">Edit Song</a>

            <a href="./song-list.php" type="button" class="btn btn-outline-secondary">Dismiss</a>
        </div>
    </div>
    <?php } ?>
    <?php } else {
    	echo '<h6>No such record exist!</h6>';
    } ?>
</form>

							

						</div>
					</div>
				</div>
			</div>