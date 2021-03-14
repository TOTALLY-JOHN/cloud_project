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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tech Army</title>
    </head>
    <link rel="stylesheet" href="../lib/styles/login_style.css">
    <style>
        
    </style>
    <body>

        <div id="loginContainer">
            <div id="logoImageContainer">
                <img id="logoImage" src="../images/TechArmy_Logo.png" alt="tech_army_logo" />
            </div>
            <h1 id="loginHeader">Log In</h1>
            <div id="loginBodyContainer">
                <form method="post" autocomplete="off">
                    <span class="loginLabel">Username</span><br />
                    <input type="text" id="usernameInput" name="usernameInput" placeholder="Type your username" required/><br />
                    <span class="loginLabel">Password</span><br />
                    <input type="password" id="pwdInput" name="pwdInput" placeholder="Type your password" required/><br />
                    <div id="forgotPwdLabel"><a id="forgotPwdLink" href="forgot_password.php">Forgot Password?</a></div><br />
                    <input type="submit" class="loginBtn" value="LOGIN" /><br />
                </form>

                <div id="signupLabel">
                    <p class="loginLabel">Don&apos;t have an account?</p>
                    <a id="signupLink" href="signup.php">Sign Up</a>
                </div><br />
            </div>

        </div>

        <footer>
        </footer>
    </body>
</html>