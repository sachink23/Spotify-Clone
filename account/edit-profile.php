
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
                    <h3>Profile Overview</h3>
                    <?php

                        if (isset($_SESSION['msg'])) {

                            echo '<div class="alert alert-danger" role="alert" style="border-radius: 0;">'.$_SESSION['msg'].'
                                    </div>';
                            unset($_SESSION['msg']);
                        }


                    ?>
                                        <form id="editForm" class="form-account form" action="../backend/editProfile.php" method="post">

                        <?php foreach ($arr_all as $key) { ?>
                        <div class="form-group">
                            <label for="inputEmail4">Email</label>
                            <div class="form-input-bg">
                                <input type="email" name="email" class="form-control" id="inputEmail4" value="<?php echo $key['email']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName44">Name</label>
                            <div class="form-input-bg">
                                <input type="text" name="name" class="form-control" id="inputName44" value="<?php echo $key['name']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputState__">Gender</label>
                            <div class="form-input-bg">
                                <select id="inputState__" class="form-control" name="gender">
                                    <option>-- SELECT --</option>
                                    <option <?php if ($key['gender'] == 'Male') {
                                        echo 'selected';
                                    } ?> value="Male">Male</option>
                                    <option <?php if ($key['gender'] == 'Female') {
                                        echo 'selected';
                                    } ?> value="Female">Female</option>
                                    <option <?php if ($key['gender'] == 'Not Listed') {
                                        echo 'selected';
                                    } ?> value="Not Listed">Not Listed</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword4">Mobile Number</label>
                            <div class="form-input-bg">
                                <input type="number" class="form-control" id="inputPassword4" value="<?php echo $key['number']; ?>" name="number">
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="button">Update</button>
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