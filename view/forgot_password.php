<?php
    session_start();
    session_unset();
    session_destroy();
    require_once('../controller/profile_controller.php');
    include('../lib/common/languages.php');
    $controllers = new ProfileController();
    

    // define variables and set to empty values
    $usernameErr =  "";
    $username = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (empty($_POST["username"])) 
        {
            $usernameErr = "Username is required";
        } 
        else 
        {
            $username = test_input($_POST["username"]);
        }  
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //! LANGUAGE SETTINGS
    $lang = $_SESSION['userLanguage'] ?? "en";
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
    <link rel="stylesheet" href="../lib/assets/css/utilLogin.css">
    <link rel="stylesheet" href="../lib/assets/css/forgotpswd_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
			$(document).ready(function() {
				<?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $queryResult = $controllers->resetUserPwd();
                        if ($queryResult == "success") {
                            ?>
                                $("#successModal").modal();
                            <?php 
                        } else {
                            ?>
                                $("#failureModal").modal();
                            <?php
                        }
                    }
				?>
			});
		</script>
    <style>
        
    </style>
    <body>
        <div class="limiter">
			<div class="forgotContainer">
				<div class="wrap-forgot100 p-l-85 p-r-85 p-t-40 p-b-55">
					<div id="logoImageContainer">
						<img id="logoImage" src="../lib/assets/img/techlogo1.png" alt="tech_army_logo" style="width:50%" />
					</div>
					<form class="forgot100-form validate-form flex-sb flex-w" method="post" autocomplete="off" name="myFormOne" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<span class="forgotTittle p-t-40 p-b-40">
							Forgot Password
						</span>

                        <div class="resetpwheader p-b-40">
                            <p style="font-size: 16px;">Please enter the username your account is registered with: </p>   
                        </div>

                        <div class="wrap-input100 validate-input m-b-12">
                            <input type="text" class="input100" placeholder="Username" name="username" style="font-size: 16px;" required="required">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user" aria-hidden="true"></i>
							</span>
                            <span class="error"> <?php echo $usernameErr;?></span>
						</div>

						<div class="conatinerSubmitButton p-t-40">
							<input type="submit" class="submit" value="Submit" style="color: white;" />
						</div> <br />

                        <div style="width: 100%; text-align:center;"><a href="login.php">Go Back</a></p>
					</form>
				</div>
			</div>
		</div>

        <!-- <div id="forgotPwdContainer">
            <div id="logoImageContainer">
                <img id="logoImage" src="../images/techlogo1.png" alt="tech_army_logo" />
            </div>
            <h1 id="forgotPwdHeader"><?php echo $languages[$lang]['forgot_password'];?></h1>
            <div id="resetpwheader">
                <p><?php echo $languages[$lang]['forgot_password_messafge'];?></p>   
            </div>
            <div id="forgotPwdBodyContainer">
                <form method="post" autocomplete="off" name="myFormOne" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <?php echo $languages[$lang]['username'];?>: <input type="text" name="username" required>
                    <span class="error"> <?php echo $usernameErr;?></span>
                    <br><br>
                    <input type="submit" class="submitButton" value="<?php echo $languages[$lang]['submit'];?>"/><br />               
                </form>
            </div>
        </div> -->

        <div id="successModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><?php echo $languages[$lang]['success'];?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<p><?php echo $languages[$lang]['successfully_requested'];?></p>
					</div>
					<div class="modal-footer">
                        <a href="dashboard.php" class="btn btn-danger" data-dismiss="modal"><?php echo $languages[$lang]['close'];?></a>
					</div>
				</div>
			</div>
		</div>
		<div id="failureModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><?php echo $languages[$lang]['error'];?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<p><?php echo $languages[$lang]['failed_to_request'];?></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $languages[$lang]['close'];?></button>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>