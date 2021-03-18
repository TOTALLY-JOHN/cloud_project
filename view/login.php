<?php
    session_start();
    session_unset();
    session_destroy();
    require_once('../controller/login_controller.php');
    $controllers = new LoginController();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    </head>
    <body>
    <div class="limiter">
		<div class="loginContainer">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-40 p-b-55">
                <div id="logoImageContainer">
                    <img id="logoImage" src="../images/techlogo.png" alt="tech_army_logo" />
                </div>
				<form class="login100-form validate-form flex-sb flex-w" action = "" method="post" onsubmit=" return notify();">
					<span class="loginTittle p-t-40 p-b-40">
						Login
					</span>
				
					<div class="wrap-input100 validate-input m-b-36">
						<input type="text" class="input100" placeholder="Username " id="usernameInput" style="font-size: 16px;" pattern="^[A-Za-z0-9]{4,}$" title="Username must contain at least 4 characters." required="required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
				
					<div class="wrap-input100 validate-input m-b-12">
						<input type="password" class="input100" placeholder="Password" id="passwordInput" style="font-size: 16px;" pattern="^.{8,}$" title="Password must contain at least 8 characters." required="required" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="w-full p-b-48" style="text-align: right;">
						<div>
							<a href="forgot_password.php" class="txt3" >
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="conatinerLoginButton">
						<button class="logIn" style="color: white; ">
							Login
						</button>
					</div>

				</form>
                <div id="signupLabel" >
                        <p class="txt2">Don&apos;t have an account?</p>
                        <a href="signup.php" class="txt3">Sign Up
							
						</a>
				</div>
			</div>
		</div>
	</div>

        <footer>
        </footer>
    </body>
</html>