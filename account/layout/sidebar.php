<?php

include_once("../backend/connection-pdo.php");

$sql = "SELECT path FROM users_table WHERE id = ?";

$query  = $pdoconn->prepare($sql);
$query->execute([$_SESSION['user_id']]);
$path_arr=$query->fetchAll(PDO::FETCH_ASSOC);



?>

<div class="section-menu">
<div class="section-menu-user">
    <div class="section-menu-user-img">
        <!-- <img src="./images/user.svg" alt="user"> -->
        <?php foreach ($path_arr as $key) { ?>
        <img src="<?php
            if(empty($key['path'])){
                echo '../images/team.jpg';
            } else {
                echo $key['path'];
            }

        ?>" alt="user">

        <?php } ?>
        <label for="addUserImg" id="addUserImg-label">
            <i class="fas fa-user-edit"></i>
        </label>
        <input type="file" name="addUserImg" id="addUserImg">
        <input type="hidden" id="_userToken" value="<?php echo $_SESSION['user_id']; ?>">
    </div>

</div>
<ul class="section-menu-nav">
    <li class="section-menu-nav-item">
        <a href="../account/" class="d-block section-menu-nav-link">
            <span>
                <i class="fas fa-home"></i>
            </span>
            Account overview
        </a>
    </li>
    <li class="section-menu-nav-item">
        <a href="./edit-profile.php" class="d-block section-menu-nav-link">
            <span>
                <i class="fas fa-pencil-alt"></i>
            </span>
            Edit profile
        </a>
    </li>
    <li class="section-menu-nav-item">
        <a href="./edit-password.php" class="d-block section-menu-nav-link">
            <span>
                <i class="fas fa-lock"></i>
            </span>
            Change password
        </a>
    </li>
    <li class="section-menu-nav-item">
        <a href="./subscription.php" class="d-block section-menu-nav-link">
            <span>
                <i class="far fa-credit-card"></i>
            </span>
            Subscription
        </a>
    </li>
    <li class="section-menu-nav-item">
        <a href="./privacy.php" class="d-block section-menu-nav-link">
            <span>
                <i class="fas fa-user-lock"></i>
            </span>
            Privacy settings
        </a>
    </li>
</ul>
</div>