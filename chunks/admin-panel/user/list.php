<?php
include_once("../backend/connection-pdo.php");

$sql = "SELECT * FROM users_table";

$query  = $pdoconn->prepare($sql);
$query->execute();

$arr_user=$query->fetchAll(PDO::FETCH_ASSOC);


?>




<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<div class="main-section">
							<h2 class="content-heading">Users List</h2>


						<?php 
						
						// session_destroy();

                        if(isset($_SESSION['error'])){
							echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
							unset($_SESSION['error']);
                        }
                        ?>
                        

                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 1;
                                    foreach($arr_user as $arr) {
                                ?>

                                <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $arr['name']; ?></td>
                                <td><?php echo $arr['email']; ?></td>
                                <td><?php echo $arr['gender']; ?></td>
                                <td><a href="<?php echo "favorite-list.php?id=".$arr['id']; ?>"><span class="badge badge-danger">Favorites</span></a>
                                &nbsp;&nbsp;
                                <a href="<?php echo "user-more.php?id=".$arr['id']; ?>"><span class="badge badge-success">More...</span></a></td>
                                </tr>


                                <?php

                                $count++;
                                }

                                ?>
                            </tbody>
                            </table>

							

						</div>
					</div>
				</div>
			</div>