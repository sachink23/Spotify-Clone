    <div id="root">
        <div class="flexWrapper">
<header id="header">
<nav class="nav-main">
    <a href="../" class="nav-brand">Spotify</a>
    <ul>
        <li class="nav-item">
            <a href="./" class="nav-link active">
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
            <a href="./library.php" class="nav-link">
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