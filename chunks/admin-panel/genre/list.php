<?php

include_once '../backend/connection-pdo.php';

$sql = "SELECT id, name, description FROM genre_table;";

$query = $pdoconn->prepare($sql);

$query->execute();

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
							<h2 class="content-heading">All Genres</h2>
                        
							
							<table class="table">
  <thead>
    <tr>
      <th scope="col">Sl No</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  	<?php $count = 1; ?>

  	<?php foreach ($arr as $row) { ?>

    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['description']; ?></td>
      <td>
      	<a href="./genre-edit.php?id=<?php echo $row['id']; ?>">
      		<span class="badge badge-info">Edit</span>
      	</a>

      	<a href="../backend/admin-panel/delete-genre.php?id=<?php echo $row['id']; ?>">
      		<span class="badge badge-danger">Delete</span>
      	</a>
      </td>
    </tr>

    <?php $count++; ?>

	<?php } ?>

  </tbody>
</table>


							

						</div>
					</div>
				</div>
			</div>