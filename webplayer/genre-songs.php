<?php require './layout/head.php'; ?>
<?php require './layout/left-sidebar.php'; ?>


<?php

include_once '../backend/connection-pdo.php';

$emp = false;

if (isset($_REQUEST['gid'])) {
	
	$sql = "SELECT songs_table.id, songs_table.name AS sname, genre_table.name AS gname, artist_table.name AS aname FROM songs_table LEFT JOIN genre_table ON songs_table.genre_id = genre_table.id LEFT JOIN artist_table ON songs_table.artist_id = artist_table.id WHERE songs_table.genre_id = ?";


	$query  = $pdoconn->prepare($sql);
	$query->execute([$_REQUEST['gid']]);

	$arr_song=$query->fetchAll(PDO::FETCH_ASSOC);

    if (empty($arr_song)) {

        $emp = true;

        
    } else {

        $sql = "SELECT name FROM genre_table WHERE id = ?";

        $query  = $pdoconn->prepare($sql);
        $query->execute([$_REQUEST['gid']]);
        $arr_gen=$query->fetchAll(PDO::FETCH_ASSOC);
        $gen_name = '';
        foreach ($arr_gen as $key) {
            $gen_name = $key['name'];
        }
    }


} else {

	$sql = "SELECT songs_table.id, songs_table.name AS sname, genre_table.name AS gname, artist_table.name AS aname FROM songs_table LEFT JOIN genre_table ON songs_table.genre_id = genre_table.id LEFT JOIN artist_table ON songs_table.artist_id = artist_table.id;";


	$query  = $pdoconn->prepare($sql);
	$query->execute();

	$arr_song=$query->fetchAll(PDO::FETCH_ASSOC);

}










?>






<section id="section-main">
    <div class="filterNav">
        <a href="./index.php" class="filterNav-link">Featured</a>
        <a href="./category.php" class="filterNav-link">Categories</a>
        <a href="./genre.php" class="filterNav-link active">Genre</a>
        <a href="./mood.php" class="filterNav-link">Mood</a>
        <a href="./artist.php" class="filterNav-link">Artist</a>
        <a href="./favorite.php" class="filterNav-link">Favorites</a>
    </div>
    <div class="music">
        <div class="music-page">
            <div class="music-head">
                <div class="music-head-item">

                    <?php if (!isset($_REQUEST['gid'])) {
                        echo '<h1>All Genre Song List</h1>';
                    } else if($emp) {

                        echo '<h1>No songs Found!</h1>';

                    } else {

                        echo '<h1>' . $gen_name. ' Songs</h1>';

                    }?>

                	
                </div>
            </div>
            <div class="music-row">

<?php $count = 1; ?>

        <?php foreach ($arr_song as $key) { ?>

                <a href="./genre-songs.php?gid=<?php echo $_REQUEST['gid']; ?>&id=<?php echo $key['id']; ?>" class="music-col">
                    <div class="music-img">
                        <img src="../images/home<?php echo $count; ?>.jpg" alt="night" class="img-fluid">
                        <button class="music-playBtn">
                            <img src="../images/play.svg" alt="play">
                        </button>
                    </div>
                    <h3><?php echo $key['sname']; ?></h3>
                    <h5><?php echo $key['aname']; ?></h5>
                </a>



              <?php $count++; ?>

            <?php if ($count == 7) {
                $count = 1;
            } ?>

                
        <?php } ?> 

                
                
                
            </div>
        </div>
    </div>
</section>



<?php require './layout/player.php'; ?>
<?php require './layout/bottom.php'; ?>