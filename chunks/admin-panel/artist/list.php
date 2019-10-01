<?php
include_once("../backend/connection-pdo.php");

$sql = "SELECT * FROM artist_table";

$query  = $pdoconn->prepare($sql);
$query->execute();

$arr_login=$query->fetchAll(PDO::FETCH_ASSOC);


?>




<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<div class="main-section">
							<h2 class="content-heading">Artists List</h2>


						<?php 
						
						// session_destroy();

                        if(isset($_SESSION['msg'])){
							echo '<div class="alert alert-danger" role="alert">'.$_SESSION['msg'].'</div>';
							unset($_SESSION['msg']);
                        }
                        ?>
                        

                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 1;
                                    foreach($arr_login as $arr) {
                                ?>

                                <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $arr['name']; ?></td>
                                <td><?php echo $arr['description']; ?></td>
                                <td>
                                <a href="<?php echo "../backend/admin-panel/delete-artist.php?id=".$arr['id']; ?>"><span class="badge badge-danger">Delete</span></a></td>
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