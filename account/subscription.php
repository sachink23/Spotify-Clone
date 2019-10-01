<?php include_once("./layout/head.php"); ?>

<?php include_once("./layout/header.php"); ?>

<?php include_once("./layout/banner-bg.php"); ?>

<div class="row no-gutters">
    <div class="col-3">
        <?php include_once("./layout/sidebar.php"); ?>
    </div>


<div class="col-9">
                <div class="section-content">
                    <h3>Spotify Subscription</h3>
                    <?php

                        if (isset($_SESSION['msg'])) {

                            echo '<div class="alert alert-danger" role="alert" style="border-radius: 0;">'.$_SESSION['msg'].'
                                    </div>';
                            unset($_SESSION['msg']);
                        }


                    ?>

                    <p style="color: black;">If you have Premium, you can download music and podcasts for offline listening on up to 5 devices at a time.<br><br>If you want to download music on a 6th device, you have these options:</p>
                    
                    <ul style="padding: 20px;">
                        <li style="color: black; list-style:circle;">When you download to the additional device, the device with the earliest downloads will be automatically removed from your account's offline devices list. The tracks on this device will no longer be downloaded for offline listening.</li><br>
                        <li style="color: black; list-style:circle;">Before you download to the additional device, manually remove a device from your account's offline devices list. The tracks on this device will no longer be downloaded for offline listening.</li>
                    </ul>

                    <h5 style="color: black;">Your current plan is <strong style="color: green;">Spotify Free!!</strong></h5>
                    
                    <p style="color: black;">Check out our Paid Plans when it will be available for the users!</p>
                    
                </div>
            </div>
        </div>
    </div>
</section>









<?php include_once("./layout/footer.php") ?>

<?php include_once("./layout/bottom.php") ?>