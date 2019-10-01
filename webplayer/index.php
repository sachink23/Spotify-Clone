<?php require './layout/head.php'; ?>
<?php require './layout/left-sidebar.php'; ?>

<?php

include_once '../backend/connection-pdo.php';

$sql = "SELECT name, artist, song_id FROM home_table;";


$query  = $pdoconn->prepare($sql);
$query->execute();

$arr_home=$query->fetchAll(PDO::FETCH_ASSOC);


?>

<section id="section-main">
    <div class="filterNav">
        <a href="./index.php" class="filterNav-link active">Featured</a>
        <a href="./category.php" class="filterNav-link">Categories</a>
        <a href="./genre.php" class="filterNav-link">Genre</a>
        <a href="./mood.php" class="filterNav-link">Mood</a>
        <a href="./artist.php" class="filterNav-link">Artist</a>
        <a href="./favorite.php" class="filterNav-link">Favorites</a>
    </div>
    <div class="music">
        <div class="music-page">
            <div class="music-head">
                <div class="music-head-item">
                    <h1>New Releases</h1>
                </div>
            </div>
            <div class="music-row">

        <?php $count = 1; ?>

        <?php foreach ($arr_home as $key) { ?>

                <a href="./index.php?id=<?php echo $key['song_id']; ?>" class="music-col">
                    <div class="music-img">
                        <img src="../images/home<?php echo $count; ?>.jpg" alt="night" class="img-fluid">
                        <button class="music-playBtn">
                            <img src="../images/play.svg" alt="play">
                        </button>
                    </div>
                    <h3><?php echo $key['name']; ?></h3>
                    <h5><?php echo $key['artist']; ?></h5>
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