<nav id="sidebar">
            <div class="sidebar-header">
                <a href="./dashboard.php"><h3>Spotify Dashboard</h3></a>
            </div>

            <ul class="list-unstyled components">
                <p>Welcome Admin&nbsp;&nbsp;&nbsp;&nbsp;<a href="../backend/admin/logout.php"><i class="fas fa-sign-out-alt"></i></a></p>
                <li>
                    <a href="#genreSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-heartbeat" aria-hidden="true"></i> Genre</a>
                    <ul class="collapse list-unstyled" id="genreSubmenu">
                        <li>
                            <a href="./genre-add.php">Add Genre</a>
                        </li>
                        <li>
                            <a href="./genre-list.php">View Genre</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#moodsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-headphones" aria-hidden="true"></i> Moods</a>
                    <ul class="collapse list-unstyled" id="moodsSubmenu">
                        <li>
                            <a href="./mood-add.php">Add New Mood</a>
                        </li>
                        <li>
                            <a href="./mood-list.php">View Moods</a>
                        </li>
                    </ul>
				</li>

				<li>
                    <a href="#artistSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user-ninja"></i> Artists</a>
                    <ul class="collapse list-unstyled" id="artistSubmenu">
                        <li>
                            <a href="./artist-add.php">Add New Artist</a>
                        </li>
                        <li>
                            <a href="./artist-list.php">View Artists</a>
                        </li>
                    </ul>
				</li>
				
				<li>
                    <a href="#songsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-music"></i> Songs</a>
                    <ul class="collapse list-unstyled" id="songsSubmenu">
                        <li>
                            <a href="./song-add.php">Add New Songs</a>
                        </li>
                        <li>
                            <a href="./song-list.php">View Songs</a>
                        </li>
                    </ul>
				</li>
				
				<li>
                    <a href="#usersSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user"></i> Users</a>
                    <ul class="collapse list-unstyled" id="usersSubmenu">
                        <li>
                            <a href="./user-list.php">View Users</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#playlistSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;Favorites</a>
                    <ul class="collapse list-unstyled" id="playlistSubmenu">
                        <li>
                            <a href="./favorite-list.php">View Favorites</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="#homepageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-home"></i>&nbsp;&nbsp;Homepage</a>
                    <ul class="collapse list-unstyled" id="homepageSubmenu">
                        <li>
                            <a href="./homepage-list.php">Manage Homepage</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a>
                </li>
            </ul>

        </nav>