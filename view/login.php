<?php
session_start();

/// [CHECK WHETHER THERE IS ALREADY THE SESSION FOR THE CURRENT USER USING THIS BROWSER]
if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
	session_unset();
    session_destroy();
}

/// [CONNECT THE LOGIN CONTROLLER]
require_once('../controller/login_controller.php');
$controllers = new LoginController();

/// [IF LOGIN, IT CALLS LOGIN METHOD FROM THE CONTROLLER]
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$controllers->authUserLogin();
}
?>
<DOCTYPE html>
	<html>

	<head>
		<title>Welcome to Tech Army</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../lib/styles/utilLogin.css">
		<link rel="stylesheet" href="../lib/styles/login_style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function() {
				/// [IF SIGNUP PROCESS IS SUCCESSFUL]
				<?php
				if (isset($_SESSION["signup_status"]) && $_SESSION["signup_status"] == "success") {
				?>
					$("#signupSuccessModal").modal();
				<?php
				}
				/// [IF LOGIN PROCESS IS FAILED]
				if (isset($_SESSION["login_status"]) && $_SESSION["login_status"] == "failure") {
					$_SESSION['login_status'] == "";
				?>
					$("#loginFailureModal").modal();
				<?php
					
				}
				?>
			});
		</script>
	</head>

	<body>
		<div class="limiter">
			<div class="loginContainer">
				<div class="wrap-login100 p-l-85 p-r-85 p-t-40 p-b-55">
					<div id="logoImageContainer">
						<img id="logoImage" src="../images/techlogo1.png" alt="tech_army_logo" style="width:50%" />
					</div>
					<form class="login100-form validate-form flex-sb flex-w" method="post" autocomplete="off">
						<span class="loginTittle p-t-40 p-b-40">
							Login
						</span>

						<div class="wrap-input100 validate-input m-b-36">
							<input type="text" class="input100" placeholder="Username" id="usernameInput" name="usernameInput" style="font-size: 16px;" pattern="^[A-Za-z0-9]{4,}$" title="Username must contain at least 4 characters." required="required">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input m-b-12">
							<input type="password" class="input100" placeholder="Password" id="pwdInput" name="pwdInput" style="font-size: 16px;" pattern="^.{8,}$" title="Password must contain at least 8 characters." required="required">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>

						<div class="w-full p-b-48" style="text-align: right;">
							<div>
								<a href="forgot_password.php" class="txt3">
									Forgot Password?
								</a>
							</div>
						</div>

						<div class="conatinerLoginButton">
							<input type="submit" class="login" value="LOGIN" style="color: white;" />
						</div>

					</form>
					<div id="signupLabel">
						<p class="txt2">Don&apos;t have an account?</p>
						<a href="signup.php" class="txt3">Sign Up

						</a>
					</div>
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
		<div id="loginFailureModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Error Message</h4>
					</div>
					<div class="modal-body">
						<p>Username or password is incorrect! Please try again.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</body>

	</html>