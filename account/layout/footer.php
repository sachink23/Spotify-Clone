<footer id="footer">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="row">
                        <div class="col-4">
                            <div class="footer-col">
                                <a href="#" class="footer-link logo">Spotify</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="footer-col">
                                <h3>Quick Links</h3>
                                <ul>

                                    <?php

                                    if (isset($_SESSION['user'])) {
                                        echo '<li>
                                                    <a href="./account/overview.php" class="footer-link">
                                                        Account
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="./backend/logout.php" class="footer-link">
                                                        Log Out
                                                    </a>
                                                </li>';
                                    } else {

                                        echo '<li>
                                                <a href="./signup.php" class="footer-link">
                                                    Sign Up
                                                </a>
                                            </li>
                                            <li>
                                                <a href="./login.php" class="footer-link">
                                                    Log In
                                                </a>
                                            </li>';
                                    }


                                    ?>
                                    
                                    
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="footer-col">
                                <h3>Player</h3>
                                <ul>
                                    <li>
                                        <a href="../webplayer" class="footer-link">
                                            Web Player
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://support.spotify.com/in/article/data-rights-and-privacy-settings/" class="footer-link">
                                            Terms & Conditions
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="footer-col">
                        <h3>Social Links</h3>
                        <ul class="footer-social">
                            <li class="footer-social-list">
                                <a href="#" class="footer-social-link" onclick="trigger_my_Modal('Link Not Active','Currently This link is not yet active! Keep an eye on this site for more updates!');">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="footer-social-list">
                                <a href="#" class="footer-social-link" onclick="trigger_my_Modal('Link Not Active','Currently This link is not yet active! Keep an eye on this site for more updates!');">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="footer-social-list">
                                <a href="#" class="footer-social-link" onclick="trigger_my_Modal('Link Not Active','Currently This link is not yet active! Keep an eye on this site for more updates!');">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>