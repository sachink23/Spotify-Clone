<?php

include_once '../backend/connection-pdo.php';

$sql = "SELECT * FROM genre_table WHERE id = ?";

$query  = $pdoconn->prepare($sql);

$query->execute([$_REQUEST['id']]);

$arr = $query->fetchAll(PDO::FETCH_ASSOC);


?>
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
							<h2 class="content-heading">Update Genre</h2>
                        

<form action="../backend/admin-panel/update-genre.php?id=<?php echo $_REQUEST['id']; ?>" method="post">

	<?php if (count($arr) > 0) { ?>

	<?php foreach ($arr as $row) {
	 ?>

    <div class="row">

        <div class="col-6">
            <div class="form-group text-left">

                <label for="genre-add">Genre Name</label>
                <input name="name" type="text" class="form-control" id="genre-add" value="<?php echo $row['name'] ?>" placeholder="Add a new genre">
              </div>
        </div>
        <div class="col-6">
            <div class="form-group text-left">

                <label for="genre-description">Genre Description</label>
                <input value="<?php echo $row['description'] ?>" name="desc" type="text" class="form-control" id="genre-description" placeholder="Add a new genre description">
              </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col text-right">

            <button type="submit" class="btn btn-outline-success">Update</button>

            <a href="./genre-list.php" type="button" class="btn btn-outline-secondary">Dismiss</a>
        </div>
    </div>

<?php }

} else {
	echo '<h4>Sorry! No such records!</h4>';
} ?>
    
</form>

							

						</div>
					</div>
				</div>
			</div>