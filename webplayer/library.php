<?php require './layout/head.php'; ?>

    <div id="root">
        <div class="flexWrapper">
<header id="header">
<nav class="nav-main">
    <a href="../" class="nav-brand">Spotify</a>
    <ul>
        <li class="nav-item">
            <a href="./" class="nav-link">
                <i class="fas fa-home"></i>
                Home
            </a>
        </li>
        <li class="nav-item">
            <a href="./search.php" class="nav-link">
                <i class="fas fa-search"></i>
                Search
            </a>
        </li>
        <li class="nav-item">
            <a href="./library.php" class="nav-link active">
                <i class="fas fa-align-right"></i>
                Library
            </a>
        </li>
    </ul>
</nav>
<div class="plNames-main">
    <p>Playlist</p>
    <a href="./favorite.php" type="button" id="createPL">
        <i class="fas fa-plus-circle"></i>
        Favorites
    </a>
</div>
<a href="../account/" class="userName">
    <i class="far fa-user"></i>
    <?php echo $_SESSION['user']; ?>
</a>
</header>

<?php

include_once '../backend/connection-pdo.php';

$sql = "SELECT songs_table.id, songs_table.name AS sname, artist_table.name AS aname FROM songs_table LEFT JOIN artist_table ON songs_table.artist_id = artist_table.id;";


	$query  = $pdoconn->prepare($sql);
	$query->execute();

	$arr_song=$query->fetchAll(PDO::FETCH_ASSOC);


?>

<section id="section-main">
    
    <div class="music">
        <div class="music-page">
            <div class="music-head">
                <div class="music-head-item">
                    <h1>Song Library</h1>
                </div>
            </div>
            <div class="music-row">

        <?php $count = 1; ?>

        <?php foreach ($arr_song as $key) { ?>

                <a href="./library.php?id=<?php echo $key['id']; ?>" class="music-col">
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