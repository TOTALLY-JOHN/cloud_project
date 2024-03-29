<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['userRole'] != "admin") {
    header('location: login.php');
}

/// [CONNECT THE DASHBOARD CONTROLLER]
require_once('../controller/profile_controller.php');
include('../lib/common/languages.php');
$controllers = new ProfileController();
$username = $_GET["username"];
$queryResult = $controllers->allowChangePwd($username);

//! LANGUAGE SETTINGS
$lang = $_SESSION['userLanguage'] ?? "en";
?>
<DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../lib/styles/utilLogin.css">
        <link rel="stylesheet" href="../lib/styles/login_style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>Tech Army</title>
    </head>
    <link rel="stylesheet" href="../lib/styles/login_style.css">

    <body>
        <div class="limiter">
            <div class="loginContainer">
                <div class="wrap-login100 p-l-85 p-r-85 p-t-40 p-b-55">
                    <div id="logoImageContainer">
                        <a href="../view/login.php"><img id="logoImage" src="../images/techlogo1.png" alt="tech_army_logo" style="width:50%" /></a>
                        <h2 style="padding: 25px">
                            <?php
                                if($queryResult == "success") {
                                    echo $languages[$lang]['successfully_allowed'];
                                } else {
                                    echo $languages[$lang]['failed_to_allow'];
                                }
                            ?>
                        </h2>
                        <a href="manage_users.php" class="login"><?php echo $languages[$lang]['go_back'];?></a>
                    </div>
                    
                </div>
            </div>
        </div>

    </body>
</html>