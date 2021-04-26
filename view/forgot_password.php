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
    <link rel="stylesheet" href="../lib/styles/forgot_password_style.css">
    <link rel="stylesheet" href="../lib/styles/change_profile_style.css">
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
        <div id="forgotPwdContainer">
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

        </div>
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