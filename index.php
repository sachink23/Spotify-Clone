<?php 

include_once './backend/connection-pdo.php';


$sql = "SELECT * FROM home_table";

$query = $pdoconn->prepare($sql);

$query->execute();

$arr = $query->fetchAll(PDO::FETCH_ASSOC);

// print_r($arr);

// die();

?>



<?php include_once("./chunks/head.php") ?>

<header id="header-index" class="header">
<nav class="navbar navbar-expand">
<div class="container">
<a class="navbar-brand" href="./">Spotify</a>
<div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav ml-auto">
<li class="nav-item active">
    <a class="nav-link" href="#">Premium</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#">Help</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#">Download</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#">Upgrade</a>
</li>

<?php if (isset($_SESSION['user']) && isset($_SESSION['user_id'])) {
    
    echo '<li class="nav-item">
                <a class="nav-link">Hi, '.$_SESSION['user'].'</a>
        </li>';

    echo '<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Profile
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="./account">Account</a>
                <a class="dropdown-item" href="./backend/logout.php">Logout</a>
            </div>
        </li>';

} else {

    echo '<li class="nav-item">
                <a class="nav-link" href="./login.php">Log In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./signup.php">Sign Up</a>
            </li>';

} ?>

</ul>
</div>
</div>
</nav>
    </header>
    <section class="<?php
    if(isset($_SESSION['user']) && isset($_SESSION['user_id'])) {

        echo 'hideIt';

        } else {
            echo 'showIt';
        } ?>" id="section-guest">
        <div class="guest">
            <div class="container">
                <div class="guest-content">
                    <h2>Music for everyone</h2>
                    <p>Millions of songs</p>
                    <a href="./signup.php">sign up here</a>
                </div>
            </div>
        </div>
    </section>
    <section class="<?php
    if(isset($_SESSION['user']) && isset($_SESSION['user_id'])) {

        echo 'showIt';

        } else {
            echo 'hideIt';
        } ?>" id="section-banner">
        <img src="./images/a.jpg" alt="">
    </section>
    <section class="<?php
    if(isset($_SESSION['user']) && isset($_SESSION['user_id'])) {

        echo 'showIt';

        } else {
            echo 'hideIt';
        } ?>" id="section-song">
        <div class="songs">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-10 m-auto">
                        <h1>Looking for music?</h1>
                        <h3>
                            Start listening to the best new releases.
                        </h3>
                        <a href="./webplayer" class="button-webPlay">Launch Web Player</a>
                    </div>
                </div>

<?php for ($i=0; $i < count($arr); ) { ?>
                <div class="row cstm-mar">

    <?php for ($j=$i; $j < $i + 3; $j++) { ?>

                    <div class="col-4">
                        <div class=" songs-col">
                            <img src="./images/home<?php echo $j+1; ?>.jpg" alt="">
                            <a href="./webplayer/?id=<?php echo $arr[$j]['song_id']; ?>" class="songs-col-overlay">
                                <div class="songs-col-caption">
                                    <h2><?php echo $arr[$j]['name']; ?></h2>
                                    <p><?php echo $arr[$j]['artist']; ?></p>
                                    <p class="playLink">play now</p>
                                </div>
                            </a>
                        </div>
                    </div>

            <?php if ($j + 1 == count($arr)) {
                    break;
                } ?>

    <?php } ?>
                </div>
    <?php $i += 3 ?>

<?php } ?>
            </div>
        </div>
    </section>

<?php include_once("./chunks/footer.php") ?>
<?php include_once("./chunks/bottom.php") ?>






