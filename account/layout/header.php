<header id="header-account" class="header">
        <nav class="navbar navbar-expand bg-black">
            <div class="container">
                <a class="navbar-brand" href="../">Spotify</a>
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
                <a class="dropdown-item" href="../account">Account</a>
                <a class="dropdown-item" href="../backend/logout.php">Logout</a>
            </div>
        </li>';

} else {

    echo '<li class="nav-item">
                <a class="nav-link" href="../login.php">Log In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../signup.php">Sign Up</a>
            </li>';

} ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>