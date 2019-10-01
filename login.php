<?php include_once("./chunks/head.php") ?>

<section id="logo-main">
	<div class="row text-center">
		<div class="col-12 m-auto" style="padding: 20px; border-bottom: 2px solid #e5e8e9;"><a href="./">
			<img width="200" height="60" src="./images/logo.png" alt="" style="background: black;"></a>
		</div>
	</div>


		<div class="row">
			<div class="col-4 m-auto text-center">
				<p style="color: black; padding: 20px;"><strong>To continue, log in to Spotify.</strong></p>

				<?php
                if (isset($_SESSION['msg'])) {
                    echo '<div class="alert alert-danger" role="alert" style="border-radius: 0;">
                      '.$_SESSION['msg'].'
                    </div>';
                    unset($_SESSION['msg']);
                }
                
                ?>

				<form action="./backend/login-db.php" method="post" id="login-form">
					
                        <div class="form-group">
                            <div class="form-input-bg">
                                <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email address">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-input-bg">
                                <input type="password" name="password" class="form-control" id="inputPassword44" placeholder="Password">
                            </div>
                        </div>

                        <div class="guest-content" style="padding-bottom: 40px; border-bottom: 2px solid #e2e3e8;">
			                <a href="#" onclick="document.getElementById('login-form').submit();">Log in</a>
			            </div>

			            <div style="padding-bottom: 40px; border-bottom: 2px solid #e2e3e8;">

			            	<p style="color: black; padding-top: 30px;"><strong>Don't have an account?</strong></p>

			            <a href="./signup.php" class="button-webPlay" style="padding: 0.625rem 2rem; width: 100%">Sign Up For Spotify</a>

			            </div>

			            <div style="padding-top: 20px;">
			            	<small style="color: #d3c8c6; font-size: 13px;"><strong>If you click "Log In", you agree to Spotify's Terms & Conditions and Privacy Policy.</strong></small>
			            </div>

                </form>
			</div>
	</div>
</section>



<?php include_once("./chunks/bottom.php") ?>