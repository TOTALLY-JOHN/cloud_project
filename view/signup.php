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
    <script type="text/javascript">
        function matchPassword(x, y){
            if (x.value == y.value){
                alert("Sign Up Succesful");
                window.location.replace(login.php);
            }
            else {
                alert("Password does not match!");
                document.getElementById('pwdInput1').style.borderColor = "red";
                document.getElementById('pwdInput2').style.borderColor = "red";
            };
        }
    </script>
    <style>
        
    </style>
    <body>

        <div id="signupContainer">
            <div id="logoImageContainer">
                <img id="logoImage" src="../images/techlogo1.png" alt="tech_army_logo" style="width:50%" />
            </div>
            <h1 id="signupHeader">Sign Up</h1>
            <div id="signupBodyContainer">
                <form method="post" autocomplete="off">
                    <span class="signupLabel">Email</span><br />
                    <input type="text" id="emailInput" name="emailInput" placeholder="Type your email" required/><br />
                    <span class="signupLabel">Username</span><br />
                    <input type="text" id="usernameInput" name="usernameInput" placeholder="Type your username" required/><br />
                    <span class="signupLabel">Password</span><br />
                    <input type="password" id="pwdInput1" name="pwdInput1" placeholder="Type your password" required/><br />
                    <span class="signupLabel">Re-enter Password</span><br />
                    <input type="password" id="pwdInput2" name="pwdInput2" placeholder="Re-enter your password" required/><br />
                    <input type="submit" class="signupBtn" value="SIGNUP" onclick="matchPassword(pwdInput1, pwdInput2)" /><br />
                </form>
            </div>

        </div>

        <footer>
        </footer>
    </body>
</html>