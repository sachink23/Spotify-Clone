<?php

include_once '../backend/connection-pdo.php';

$fav = false;

$current_song_id = "-1";

if (isset($_REQUEST['id'])) {

	$sql = "SELECT songs_table.id, songs_table.name AS sname, songs_table.length, songs_table.path, artist_table.name AS aname FROM songs_table LEFT JOIN artist_table ON songs_table.artist_id = artist_table.id WHERE songs_table.id = ?";

	$query  = $pdoconn->prepare($sql);
	$query->execute([$_REQUEST['id']]);
	$arr_song =$query->fetchAll(PDO::FETCH_ASSOC);

	if (empty($arr_song)) {

		$sql = "SELECT id FROM songs_table;";

		$query  = $pdoconn->prepare($sql);
		$query->execute();
		$ids =$query->fetchAll(PDO::FETCH_ASSOC);

		$items = array();
		foreach($ids as $id) {
		 	$items[] = $id['id'];
		}

		$temp_index = array_rand($items);

		$tmp_id = $items[$temp_index];

		if ($temp_index != 0) {

			$prev_id = $items[$temp_index - 1];

		} else {

			$prev_id = "-1";
		}

		if ( $temp_index != (count($items) - 1)) {

			$next_id = $items[$temp_index + 1];

		} else {

			$next_id = "-1";

		}

		$current_song_id = $tmp_id;

		$sql = "SELECT songs_table.id, songs_table.name AS sname, songs_table.length, songs_table.path, artist_table.name AS aname FROM songs_table LEFT JOIN artist_table ON songs_table.artist_id = artist_table.id WHERE songs_table.id = ?";

			$query  = $pdoconn->prepare($sql);
			$query->execute([$tmp_id]);
			$arr_song =$query->fetchAll(PDO::FETCH_ASSOC);


		$sql = "SELECT * FROM favorites_table WHERE user_id = ? AND song_id = ?";

		$query  = $pdoconn->prepare($sql);
		$query->execute([$_SESSION['user_id'], $tmp_id]);
		$arr_fav =$query->fetchAll(PDO::FETCH_ASSOC);

		if (!empty($arr_fav)) {
			$fav = true;
		}


		
	} else {

		$sql = "SELECT id FROM songs_table;";

		$query  = $pdoconn->prepare($sql);
		$query->execute();
		$ids =$query->fetchAll(PDO::FETCH_ASSOC);

		$items = array();
		foreach($ids as $id) {
		 	$items[] = $id['id'];
		}

		$temp_index = array_search($_REQUEST['id'], $items);

		if ($temp_index != 0) {

			$prev_id = $items[$temp_index - 1];

		} else {

			$prev_id = "-1";
		}

		if ( $temp_index != (count($items) - 1)) {

			$next_id = $items[$temp_index + 1];

		} else {

			$next_id = "-1";

		}

		$current_song_id = $_REQUEST['id'];

		// echo "Current : ".$_REQUEST['id']. " Pre : " .$prev_id. " Next : ".$next_id;
		// exit();

		$sql = "SELECT * FROM favorites_table WHERE user_id = ? AND song_id = ?";

		$query  = $pdoconn->prepare($sql);
		$query->execute([$_SESSION['user_id'], $_REQUEST['id']]);
		$arr_fav =$query->fetchAll(PDO::FETCH_ASSOC);

		if (!empty($arr_fav)) {
			$fav = true;
		}



	}





	
} else {

	$sql = "SELECT id FROM songs_table;";

		$query  = $pdoconn->prepare($sql);
		$query->execute();
		$ids =$query->fetchAll(PDO::FETCH_ASSOC);

		$items = array();
		foreach($ids as $id) {
		 	$items[] = $id['id'];
		}

		$temp_index = array_rand($items);

		$tmp_id = $items[$temp_index];

		if ($temp_index != 0) {

			$prev_id = $items[$temp_index - 1];

		} else {

			$prev_id = "-1";
		}

		if ( $temp_index != (count($items) - 1)) {

			$next_id = $items[$temp_index + 1];

		} else {

			$next_id = "-1";

		}

		$current_song_id = $tmp_id;

		$sql = "SELECT songs_table.id, songs_table.name AS sname, songs_table.length, songs_table.path, artist_table.name AS aname FROM songs_table LEFT JOIN artist_table ON songs_table.artist_id = artist_table.id WHERE songs_table.id = ?";

			$query  = $pdoconn->prepare($sql);
			$query->execute([$tmp_id]);
			$arr_song =$query->fetchAll(PDO::FETCH_ASSOC);


		$sql = "SELECT * FROM favorites_table WHERE user_id = ? AND song_id = ?";

		$query  = $pdoconn->prepare($sql);
		$query->execute([$_SESSION['user_id'], $tmp_id]);
		$arr_fav =$query->fetchAll(PDO::FETCH_ASSOC);

		if (!empty($arr_fav)) {
			$fav = true;
		}
}



?>



</div>
        <footer id="player-main" class="player">

        	<?php foreach ($arr_song as $row) { ?>

            <div class="player-song">
                <div class="player-song-img">
                    <img src="../images/piano.jpg" alt="piano">
                </div>
                <div class="player-song-name">
                    <a href="#">
                        <h3><?php echo $row['sname'] ?></h3>
                    </a>
                    <a href="#">By <?php echo $row['aname'] ?></a>

                </div>
                <div class="player-song-addFav">
                    <button user-id="<?php echo $_SESSION['user_id']; ?>" song-id="<?php echo $current_song_id; ?>" type="button" class="addToFav <?php if($fav) echo 'inFav'; ?>" id="addToFav"></button>
                </div>
            </div>
            <div class="player-controls-main">
                <div class="player-controls">
                    <button id="repeat" class="player-controls-btn"></button>
                    <button <?php if ($prev_id != "-1") {

                    	echo 'onclick="location.href = \'./?id='.$prev_id.'\'"';

                    } ?> id="prev" class="player-controls-btn <?php if($prev_id == "-1") echo 'disabled'; ?>"></button>
                    <button id="play" class="player-controls-btn"></button>
                    <button <?php if ($next_id != "-1") {

                    	echo 'onclick="location.href = \'./?id='.$next_id.'\'"';

                    } ?> id="next" class="player-controls-btn <?php if($next_id == "-1") echo 'disabled'; ?>"></button>
                    <div id="volume">
                        <button id="volume-icon" class="player-controls-btn"></button>
                        <div id="volume-range-main">
                            <div id="volume-range">
                                <div id="volume-range-bar" data-value="100"></div>
                                <div id="volume-range-thumb"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="player-controls-duration">
                    <span id="startTime">00:00</span>
                    <div id="duration-range-main">
                        <div id="duration-range">
                            <div id="duration-range-bar"></div>
                            <div id="duration-range-thumb"></div>
                        </div>
                    </div>
                    <span id="endTime"><?php echo $row['length'] ?></span>
                </div>

                <audio id="musicPlayer" src="../<?php echo $row['path'] ?>"></audio>
            </div>
            <!-- <div class="player-menu"></div> -->

        <?php } ?>
        </footer>