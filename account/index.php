<?php include_once("./layout/head.php"); ?>

<?php 

include_once '../backend/connection-pdo.php';


$sql = "SELECT * FROM users_table WHERE id = ?";

$query = $pdoconn->prepare($sql);

$query->execute([$_SESSION['user_id']]);

$arr = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include_once("./layout/header.php"); ?>

<?php include_once("./layout/banner-bg.php"); ?>

<div class="row no-gutters">
    <div class="col-3">
        <?php include_once("./layout/sidebar.php"); ?>
    </div>







<div class="col-9">
<div class="section-content">
    <h3>Account Overview</h3>

    <?php

                        if (isset($_SESSION['msg'])) {

                            echo '<div class="alert alert-danger" role="alert" style="border-radius: 0;">'.$_SESSION['msg'].'
                                    </div>';
                            unset($_SESSION['msg']);
                        }


                    ?>

                    
    <form id="editForm" class="form-account form">

    <?php foreach($arr as $key) { ?>

        <div class="form-group">
            <label for="name">Account Name</label>
            <div class="form-input-bg">
                <input value="<?php echo $key['name']; ?>" disabled type="text" class="form-control" id="name">
            </div>
        </div>



        <div class="form-group">
            <label for="email">Email</label>
            <div class="form-input-bg">
                <input value="<?php echo $key['email']; ?>" disabled type="email" class="form-control" id="email">
            </div>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <div class="form-input-bg">
                <input value="<?php echo $key['gender']; ?>" disabled type="text" class="form-control" id="gender">
            </div>
        </div>
    

        <div class="form-group">
            <label for="number">Mobile</label>
            <div class="form-input-bg">
                <input value="<?php echo $key['number']; ?>" disabled type="text" class="form-control" id="number">
            </div>
        </div>
        <div class="text-right">
            <a href="./edit-profile.php" type="button" class="button">Edit Profile</a>
        </div>

        <?php } ?>
    </form>
</div>
</div>
            </div>
        </div>
    </section>

<?php include_once("./layout/footer.php") ?>
<?php include_once("./layout/bottom.php") ?>