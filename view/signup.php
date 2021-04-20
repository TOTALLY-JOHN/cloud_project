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
    <link rel="stylesheet" href="../lib/styles/signup_style.css">
    <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function() {
				<?php
				if ($_SESSION["signup_status"] == "failure") {
				?>
					$("#signupfailedModal").modal();
				<?php
				}
				session_unset();
				session_destroy();
				?>
			});
		</script>
    <!-- <script type="text/javascript">
        function matchPassword(x, y){
            if (x.value == y.value){
                alert("Sign Up Successful");
                window.location.replace(login.php);
            }
            else {
                alert("Password does not match!");
                document.getElementById('userPwd').style.borderColor = "red";
                document.getElementById('userPwdConfirm').style.borderColor = "red";
            };
        }
    </script> -->
    <body>

        <div id="signupContainer">
            <div id="logoImageContainer">
                <img id="logoImage" src="../images/techlogo1.png" alt="tech_army_logo" style="width:50%" />
            </div>
            <h1 id="signupHeader">Sign Up</h1>
            <div id="signupBodyContainer">
                <form method="post" autocomplete="off">
                    <span class="signupLabel">Email</span><br />
                    <input type="text" id="userEmail" name="userEmail" placeholder="Type your email" required/><br />
                    <span class="signupLabel">Username</span><br />
                    <input type="text" id="username" name="username" placeholder="Type your username" required/><br />
                    <span class="signupLabel">Password</span><br />
                    <input type="password" id="userPwd" name="userPwd" placeholder="Type your password" required/><br />
                    <span class="signupLabel">Re-enter Password</span><br />
                    <input type="password" id="userPwdConfirm" name="userPwdConfirm" placeholder="Re-enter your password" required/><br />
                    <input type="submit" class="signupBtn" value="SIGN UP" /><br />
                    <!-- <input type="submit" class="signupBtn" value="SIGN UP" onclick="matchPassword(pwdInput1, pwdInput2)" /><br /> -->
                </form>
            </div>

        </div>

        <footer>
        </footer>
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