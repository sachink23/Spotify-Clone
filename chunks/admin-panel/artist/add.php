<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<div class="main-section">
							<h2 class="content-heading">Add Artist</h2>


						<?php 
						
						// session_destroy();

                        if(isset($_SESSION['error'])){
							echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
							unset($_SESSION['error']);
                        }
						?>
								

                            <form method="post" action="../backend/admin-panel/add-artist.php">
                        
								<div class="row">
									<div class="col-md-6">
										<div class="form-group text-left">
											<label for="artist-name">Artist Name</label>
											<input type="text" name="name" class="form-control" id="artist-name" aria-describedby="artist-help" placeholder="Add a new artist name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group text-left">
											<label for="artist-description">Artist Description</label>
											<input type="text" name="description" class="form-control" id="artist-description" aria-describedby="artist-des-help" placeholder="Add a artist description">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col text-right section-buttons">
										<button type="submit" class="btn btn-outline-success">Add Artist</button>
										<a href="artist-list.php" class="btn btn-outline-success">Dismiss</a>
									</div>
								</div>
								

							</form>

						</div>
					</div>
				</div>
			</div>