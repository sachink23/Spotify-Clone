<div class="container">

                <?php 

                if(isset($_SESSION['msg'])){
                    
                    echo '<div class="alert alert-danger" role="alert">'.$_SESSION['msg'].'</div>';

                    unset($_SESSION['msg']);

                }
                 ?>

<div class="row">
	<div class="col-12 text-center">
		<div class="main-section">
			<h2 class="content-heading">Admin Dashboard</h2>

            <div class="row">
                
                <div class="col-4 text-center">

                    <a href="./song-list.php">

                        <div class="card" style="width: 18rem;">
                          <img src="../images/admin/card1.png" class="card-img-top" alt="...">
                          <div class="card-body">
                            <p class="card-text">Manage songs directly from here!</p>
                          </div>
                        </div>

                    </a>

                </div>
                <div class="col-4 text-center">

                    <a href="./homepage-list.php">

                        <div class="card" style="width: 18rem;">
                          <img src="../images/admin/card2.png" class="card-img-top" alt="...">
                          <div class="card-body">
                            <p class="card-text">Manage Homepage directly from here!</p>
                          </div>
                        </div>

                    </a>

                </div>
                <div class="col-4 text-center">

                    <a href="./favorite-list.php">

                        <div class="card" style="width: 18rem;">
                          <img src="../images/admin/card3.png" class="card-img-top" alt="...">
                          <div class="card-body">
                            <p class="card-text">Manage User-Favorites directly from here!</p>
                          </div>
                        </div>

                    </a>


                </div>

            </div>

        

			

		</div>
	</div>
</div>
</div>





