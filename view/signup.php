<?php
    session_start();
    session_unset();
    session_destroy();
    // require_once('../controller/signup_controller.php');
    // $controllers = new SignupController();
    // if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     $controllers->registerUser();
    // }
?>
<DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tech Army</title>
    </head>
    <link rel="stylesheet" href="../lib/styles/signup_style.css">
    <style>
        
    </style>
    <body>

        <div id="signupContainer">
            <div id="logoImageContainer">
                <img id="logoImage" src="../images/TechArmy_Logo.png" alt="tech_army_logo" />
            </div>
            <h1 id="signupHeader">Sign Up</h1>
            <div id="signupBodyContainer">
                <form method="post" autocomplete="off">
                    <span class="signupLabel">Email</span><br />
                    <input type="email" id="emailInput" name="emailInput" placeholder="Type your email" required/><br />
                    <span class="signupLabel">Username</span><br />
                    <input type="text" id="usernameInput" name="usernameInput" placeholder="Type your username" required/><br />
                    <span class="signupLabel">Password</span><br />
                    <input type="password" id="pwdInput" name="pwdInput" placeholder="Type your password" required/><br />
                    <div id="forgotPwdLabel"><a id="forgotPwdLink" href="forgot_password.php">Forgot Password?</a></div><br />
                    <input type="submit" class="signupBtn" value="SIGN UP" /><br />
                </form>
            </div>

        </div>

        <footer>
        </footer>
    </body>
</html>