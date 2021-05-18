<?php
    session_start();
    require_once('../controller/signup_controller.php');
    $controllers = new SignupController();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $controllers->userSignup();
    }
?>
<DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tech Army</title>
    </head>
	<style>
		/* BUTTON */
		.signupBtn {
			background: linear-gradient(to right, #4776E6 0%, #8E54E9 51%, #4776E6 100%);
			width: 100%;
			margin: 10px;
			padding: 15px 45px;
			text-align: center;
			text-transform: uppercase;
			transition: 0.5s;
			background-size: 200% auto;
			color: white;
			box-shadow: 0 0 20px #eee;
			border-radius: 25px;
			border: none;
			display: block;
			font-size: 1em;
			/*text-shadow: 2px 2px 4px #685D5F;
			height: 50px;
			color: white;
			border: none;
			border-radius: 24px;
			margin-top: 10px;
			margin-bottom: 10px;*/
			}
		
			.signupBtn:hover {
			/*background: linear-gradient(to right, #C8D6CA, #FFFFFF);
			box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);*/
			background-position: right center;
			opacity: 0.5;
			text-decoration: none;
			}
		
			.signupBtn:active {
				box-shadow: 0 5px #666;
				transform: translateY(4px);
			}
	</style>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../lib/assets/css/login_style.css">
	<link rel="stylesheet" href="../lib/assets/css/utilLogin.css">
    <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function() {
                <?php
                    if ($_SESSION['signup_status'] == "success") {
                ?>
                    $("#signupSuccessModal").modal();
				<?php
				    } else if ($_SESSION["signup_status"] == "failure") {
				?>
					$("#signupfailedModal").modal();
				<?php
				}
				session_unset();
				session_destroy();
				?>
			});
		</script>
    <body>
		<div class="limiter">
			<div class="loginContainer">
				<div class="wrap-login100 p-l-85 p-r-85 p-t-40 p-b-55">
					<div id="logoImageContainer">
						<img id="logoImage" src="../images/techlogo1.png" alt="tech_army_logo" style="width:50%" />
					</div>
					<form class="login100-form validate-form flex-sb flex-w" method="post" autocomplete="off">
						<span class="loginTittle p-t-40 p-b-40">
							Sign Up
						</span>

						<div class="wrap-input100 validate-input m-b-36">
							<input type="text" class="input100" placeholder="Username" id="username" name="username" style="font-size: 16px;" pattern="^[A-Za-z0-9]{4,}$" title="Username must contain at least 4 characters." required="required">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input m-b-36">
							<input type="password" class="input100" placeholder="Password" id="userPwd" name="userPwd" style="font-size: 16px;" pattern="^.{8,}$" title="Password must contain at least 8 characters." required="required">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input m-b-36">
							<input type="password" class="input100" placeholder="Re-enter Password" id="userPwdConfirm" name="userPwdConfirm" style="font-size: 16px;" pattern="^.{8,}$" title="Password must contain at least 8 characters." required="required">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>
						
						<div class="conatinerLoginButton">
							<input type="submit" class="signupBtn" value="SIGN UP" style="color: white;" />
						</div> <br />

						<div style="width: 100%; text-align:center;"><a href="login.php">Go to Login Page</a></p>

					</form>
				</div>
			</div>
		</div>

        <footer>
        </footer>
        <div id="signupSuccessModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Success Message</h4>
					</div>
					<div class="modal-body">
						<p>Successfully signed up!</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
        <div id="signupfailedModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Failed Message</h4>
					</div>
					<div class="modal-body">
						<p>Failed to sign up! You may try to use another username or check for your connection.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>
