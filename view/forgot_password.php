<?php
    session_start();
    session_unset();
    session_destroy();
    // require_once('../controller/signup_controller.php');
    // $controllers = new SignupController();
    // if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     $controllers->registerUser();
    // }


    // define variables and set to empty values
    $emailErr =  "";
    $email = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
          if (empty($_POST["email"])) 
          {
            $emailErr = "*Email is required";
          } 
          else 
          {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
              $emailErr = "*Invalid email format";
            }
            else
            {
                header("Location:resetpassword.php");
            }
          }  
        }

       function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
}

?>
<DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tech Army</title>
        <style>
            .error {color: #FF0000;}
        </style>
    </head>
    <link rel="stylesheet" href="../lib/styles/forgot_password_style.css">
    <script type="text/javascript">
    </script>
    <style>
        
    </style>
    <body>
        <div id="forgotPwdContainer">
            <div id="logoImageContainer">
                <img id="logoImage" src="../images/TechArmy_Logo.png" alt="tech_army_logo" />
            </div>
            <h1 id="forgotPwdHeader">Forgot Password?</h1>
            <div id="resetpwheader">
                <p>Please enter the email your account is registered with</p>   
            </div>
            <div id="forgotPwdBodyContainer">
                <form method="post" autocomplete="off" name="myFormOne" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    E-mail: <input type="text" name="email">
                    <span class="error"> <?php echo $emailErr;?></span>
                    <br><br>
                    <input type="submit" class="submitButton" value="Submit" onclick="ValidateEmail(emailInput)" /><br />               
                </form>
            </div>

        </div>

        <footer>
        </footer>
    </body>
</html>