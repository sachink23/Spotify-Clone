<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<div class="main-section">
							<h2 class="content-heading">Add Mood</h2>


						<?php 
						
						// session_destroy();

                        if(isset($_SESSION['error'])){
							echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
							unset($_SESSION['error']);
                        }
						?>
								

                            <form method="post" action="../backend/admin-panel/add-mood.php">
                        
								<div class="row">
									<div class="col-md-6">
										<div class="form-group text-left">
											<label for="mood-name">Mood Name</label>
											<input type="text" name="name" class="form-control" id="mood-name" aria-describedby="mood-help" placeholder="Add a new mood name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group text-left">
											<label for="genre-description">Mood Description</label>
											<input type="text" name="description" class="form-control" id="mood-description" aria-describedby="mood-des-help" placeholder="Add a mood description">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col text-right section-buttons">
										<button type="submit" class="btn btn-outline-success">Add Mood</button>
										<a href="mood-list.php" class="btn btn-outline-success">Dismiss</a>
									</div>
								</div>
								

							</form>

						</div>
					</div>
				</div>
			</div>