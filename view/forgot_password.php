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
    <link rel="stylesheet" href="../lib/styles/forgot_password_style.css">
    <style>
        
    </style>
    <body>

        <div id="forgotPwdContainer">
            <div id="forgotPwdContainer">
                <img id="logoImage" src="../images/TechArmy_Logo.png" alt="tech_army_logo" />
            </div>
            <h1 id="forgotPwdHeader">Forgot Passwowrd?</h1>
            <div id="forgotPwdBodyContainer">
                <form method="post" autocomplete="off">
                </form>
            </div>

        </div>

        <footer>
        </footer>
    </body>
</html>