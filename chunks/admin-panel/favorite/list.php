<?php
include_once("../backend/connection-pdo.php");

if (!isset($_REQUEST['id'])) {
    
    $sql = "SELECT favorites_table.song_id, users_table.name AS uname, artist_table.name AS aname, songs_table.name AS sname FROM favorites_table LEFT JOIN users_table ON favorites_table.user_id = users_table.id LEFT JOIN songs_table ON favorites_table.song_id = songs_table.id LEFT JOIN artist_table ON songs_table.artist_id = artist_table.id;";

    $query  = $pdoconn->prepare($sql);

    $query->execute();

    $arr_favorites=$query->fetchAll(PDO::FETCH_ASSOC);


} else {

    $sql = "SELECT favorites_table.song_id, users_table.name AS uname, artist_table.name AS aname, songs_table.name AS sname FROM favorites_table LEFT JOIN users_table ON favorites_table.user_id = users_table.id LEFT JOIN songs_table ON favorites_table.song_id = songs_table.id LEFT JOIN artist_table ON songs_table.artist_id = artist_table.id WHERE favorites_table.user_id = ?;";

    $query  = $pdoconn->prepare($sql);

    $query->execute([$_REQUEST['id']]);

    $arr_favorites=$query->fetchAll(PDO::FETCH_ASSOC);

}


// $sql = "SELECT * FROM users_table";

// $query  = $pdoconn->prepare($sql);
// $query->execute();

// $arr_user=$query->fetchAll(PDO::FETCH_ASSOC);


?>




<div class="container">
<div class="row">
<div class="col-12 text-center">
<div class="main-section">
	<h2 class="content-heading">Favorite Songs of the User</h2>


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
        <th scope="col">User Name</th>
        <th scope="col">Song Name</th>
        <th scope="col">Artist</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $count = 1;
            foreach($arr_favorites as $arr) {
        ?>

        <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo $arr['uname']; ?></td>
        <td><?php echo $arr['sname']; ?></td>
        <td><?php echo $arr['aname']; ?></td>
        <td>
            <a href="<?php echo "./song-detail.php?id=".$arr['song_id']; ?>"><span class="badge badge-success">Song Details</span></a>
        </td>
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