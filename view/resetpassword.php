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
            <div id="logoImageContainer">
                <img id="logoImage" src="../images/techlogo1.png" alt="tech_army_logo" />
            </div>
            <h1 id="forgotPwdHeader">Successful sent an email to you, please check your email for the reset link</h1>
        </div>

        <footer>
        </footer>
    </body>
</html>