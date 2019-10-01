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
							<h2 class="content-heading">Add New Genre</h2>
                        

                        <form action="../backend/admin-panel/add-genre.php" method="post">

                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group text-left">

                                        <label for="genre-add">Genre Name</label>
                                        <input name="name" type="text" class="form-control" id="genre-add" placeholder="Add a new genre">
                                      </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group text-left">

                                        <label for="genre-description">Genre Description</label>
                                        <input name="desc" type="text" class="form-control" id="genre-description" placeholder="Add a new genre description">
                                      </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col text-right">

                                    <button type="submit" class="btn btn-outline-success">Submit</button>

                                    <a href="./genre-list.php" type="button" class="btn btn-outline-secondary">Dismiss</a>
                                </div>
                            </div>
                            
                        </form>

							

						</div>
					</div>
				</div>
			</div>