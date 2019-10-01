
<?php include_once("./layout/head.php"); ?>

<?php 

include_once '../backend/connection-pdo.php';


$sql = "SELECT * FROM users_table WHERE id = ?";

$query = $pdoconn->prepare($sql);

$query->execute([$_SESSION['user_id']]);

$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include_once("./layout/header.php"); ?>

<?php include_once("./layout/banner-bg.php"); ?>

<div class="row no-gutters">
    <div class="col-3">
        <?php include_once("./layout/sidebar.php"); ?>
    </div>

            <div class="col-9">
                <div class="section-content">
                    <h3>Change Password</h3>


                    <?php

                        if (isset($_SESSION['msg'])) {

                            echo '<div class="alert alert-danger" role="alert" style="border-radius: 0;">'.$_SESSION['msg'].'
                                    </div>';
                            unset($_SESSION['msg']);
                        }


                    ?>


                    <?php

                        if (isset($_SESSION['msg'])) {

                            echo '<div class="alert alert-danger" role="alert" style="border-radius: 0;">'.$_SESSION['msg'].'
                                    </div>';
                            unset($_SESSION['msg']);
                        }


                    ?>

                    

                    <form id="editForm" class="form-account form" action="../backend/editPass.php" method="post">

                        <div class="form-group">
                            <label for="currentPass">Current Password</label>
                            <div class="form-input-bg">
                                <input type="password" name="cpass" class="form-control" id="currentPass">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="newPass">New Password</label>
                            <div class="form-input-bg">
                                <input type="password" name="npass" class="form-control" id="newPass">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="conPass">Confirm Password</label>
                            <div class="form-input-bg">
                                <input type="password" name="conpass" class="form-control" id="conPass">
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="button">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include_once("./layout/footer.php") ?>

<?php include_once("./layout/bottom.php") ?>