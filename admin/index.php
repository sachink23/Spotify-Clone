<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spotify Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <style>
        body {
            /* uigradients.com */
            background: #000000;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #434343, #000000);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #434343, #000000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row p-3">
            <form class="col-sm-12 col-md-6 col-lg-4 mt-5 ml-auto mr-auto border p-3 m-2" style  method="post" action="../backend/admin-panel/admin-login-db.php">
                <div class="form-group text-center">
                    <h3 style="font-family: comic sans ms" class="mt-2 mb-2">Spotify Admin</h3>
                </div>
				<?php 

				if (isset($_SESSION['msg'])) {
					echo '<div class="alert alert-danger" role="alert">
						<strong>'.$_SESSION['msg'].'</strong>
					</div>';

					unset($_SESSION['msg']);
				}
			 	?>
                <div class="form-group">
					<label for="email">Email Address</label>
					<input type="email" name="email" id="email" class="form-control" reuired placeholder="Enter Email" aria-describedby="helpId">
					<small id="helpEmail" class="text-muted"></small>
                </div>
                <div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" required class="form-control" placeholder="Enter Password" aria-describedby="helpId">
					<small id="helpPassword" class="text-muted"></small>
                </div>
                <div class="form-group ">
                    <a href="#" class="text-light">Forgot Password ?</a>
                    <button type="submit" style="float: right" class="btn btn-lg bg-light">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
			

			