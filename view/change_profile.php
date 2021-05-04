<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('location: login.php');
    }
    require_once('../controller/profile_controller.php');
    include('../lib/common/languages.php');
    $controllers = new ProfileController();
    $username = $_SESSION['username'];
    $row = $controllers->getProfile($username);

    //! LANGUAGE SETTINGS
    $lang = $_SESSION['userLanguage'] ?? "en";
?>
<DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tech Army</title>
    </head>
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
                        $queryResult = $controllers->changeProfile();
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
            body {
                background-image: url("../images/bg-01.jpg");
                background-size: 100% 800px;
            }

            #profileContainer {
                width: 70%;
                height: 750;
                padding: 1em;
                margin: 2em auto 0px auto;
                background-color: white;
                border-radius: 25px;
            }

            #logoImageContainer {
                text-align: center;
            }

            #logoImage {
                width: 200px;
            }

            #profileHeader {
                font-size: 2.5em;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                text-align: center;
            }

            #profileBodyContainer {
                width: 85%;
                margin: 0px auto 0px auto;
            }

            .profileLabel {
                font-size: 1.0em;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

            }

            input[type=email],
            input[type=text],
            input[type=password] {
                width: 100%;
                padding: 15px;
                margin: 5px 0 22px 0;
                display: inline-block;
                border: none;
                background: #f1f1f1;
                border-radius: 25px;
            }

            input[type=email]:focus,
            input[type=text]:focus,
            input[type=password]:focus {
                border-radius: 25px;
                background-color: #eeeeee;
                outline: none;
            }

            .profileBtn {
                background-image: linear-gradient(to right, #4776E6 0%, #8E54E9 51%, #4776E6 100%)
            }

            .profileBtn {
                width: 100%;
                padding: 15px 45px;
                text-align: center;
                text-transform: uppercase;
                transition: 0.5s;
                background-size: 200% auto;
                color: white;
                box-shadow: 0 0 20px #eee;
                border-radius: 25px;
                border: none;
                display: block;
                font-size: 1em;
            }

            .profileBtn:hover {
                background-position: right center;
                color: #fff;
                text-decoration: none;
            }

            .nav li p {
                font-size: 15px;
            }
        </style>
    <body>
        <div id="profileContainer">
            <div id="logoImageContainer">
                <img id="logoImage" src="../images/techlogo1.png" alt="tech_army_logo"/>
            </div>
            <h1 id="profileHeader"><?php echo $languages[$lang]['change_profile'];?></h1>
            <div id="profileBodyContainer">
                <form method="post" autocomplete="off">
                <span class="profileLabel"><?php echo $languages[$lang]['username'];?></span><br />
                    <input type="text" id="username" name="username" placeholder="Type your username" value="<?php echo $row['username'];?>" readonly/><br />
                    <span class="profileLabel"><?php echo $languages[$lang]['new_password'];?></span><br />
                    <input type="password" id="userPwd" name="userPwd" placeholder="<?php echo $languages[$lang]['new_password'];?>" required/><br />
                    <span class="profileLabel"><?php echo $languages[$lang]['re_enter_password'];?></span><br />
                    <input type="password" id="userPwdConfirm" name="userPwdConfirm" placeholder="<?php echo $languages[$lang]['re_enter_password'];?>" required/><br /><br />
                    <input type="submit" class="profileBtn" value="<?php echo $languages[$lang]['submit'];?>" /><br />
                    <p style="text-align:center;"><a href="dashboard.php"><?php echo $languages[$lang]['go_back'];?></a></p>
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
						<p><?php echo $languages[$lang]['successfully_updated'];?></p>
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
						<p><?php echo $languages[$lang]['failed_to_update'];?></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $languages[$lang]['close'];?></button>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>