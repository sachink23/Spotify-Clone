<?php

include_once '../backend/connection-pdo.php';

$sql = "SELECT songs_table.id, songs_table.path, songs_table.length, songs_table.name AS sname, artist_table.name AS aname, genre_table.name AS gname FROM songs_table LEFT JOIN artist_table ON songs_table.artist_id = artist_table.id LEFT JOIN genre_table ON songs_table.genre_id = genre_table.id;";

$query = $pdoconn->prepare($sql);

$query->execute();

$arr = $query->fetchAll(PDO::FETCH_ASSOC);


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
							<h2 class="content-heading">All Song List</h2>
                        
							
							<table class="table">
  <thead>
    <tr>
      <th scope="col">Sl No</th>
      <th scope="col">Name</th>
      <th scope="col">Length</th>
      <th scope="col">Artist</th>
      <th scope="col">Genre</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  	<?php $count = 1; ?>

  	<?php foreach ($arr as $row) { ?>

    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td>
        <?php echo $row['sname']; ?>
        <img id="speaker-anim-<?php echo $count; ?>" class="hide-gif" src="../images/speaker.gif" alt="">
      </td>
      <td><?php echo $row['length']; ?></td>
      <td><?php echo $row['aname']; ?></td>
      <td><?php echo $row['gname']; ?></td>
      <td>
        <a href="#" onclick="playmusic(<?php echo $count; ?>);">
          <span id="span<?php echo $count; ?>" class="badge badge-primary">Play</span>
        </a>
        <audio onended="endAudio()" id="audio<?php echo $count; ?>" src="../<?php echo $row['path']; ?>"></audio>
      	<a href="./song-edit.php?id=<?php echo $row['id']; ?>">
      		<span class="badge badge-info">Edit</span>
      	</a>

      	<a href="../backend/admin-panel/delete-songs.php?id=<?php echo $row['id']; ?>">
      		<span class="badge badge-danger">Delete</span>
      	</a>
      </td>
    </tr>

    <?php $count++; ?>

	<?php } ?>

  </tbody>
</table>


							

						</div>
					</div>
				</div>
			</div>