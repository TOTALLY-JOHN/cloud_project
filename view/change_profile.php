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
    <body>
        <div id="profileContainer">
            <div id="logoImageContainer">
                <img id="logoImage" src="../images/techlogo1.png" alt="tech_army_logo" style="width:50%" />
            </div>
            <h1 id="profileHeader"><?php echo $languages[$lang]['change_profile'];?></h1>
            <div id="profileBodyContainer">
                <form method="post" autocomplete="off">
                <span class="profileLabel"><?php echo $languages[$lang]['username'];?></span><br />
                    <input type="text" id="username" name="username" placeholder="Type your username" value="<?php echo $row['username'];?>" readonly/><br />
                    <span class="profileLabel"><?php echo $languages[$lang]['user_email'];?></span><br />
                    <input type="text" id="userEmail" name="userEmail" placeholder="<?php echo $languages[$lang]['user_email'];?>" value="<?php echo $row['userEmail'];?>" required/><br />
                    <span class="profileLabel"><?php echo $languages[$lang]['new_password'];?></span><br />
                    <input type="password" id="userPwd" name="userPwd" placeholder="<?php echo $languages[$lang]['new_password'];?>" required/><br />
                    <span class="profileLabel"><?php echo $languages[$lang]['re_enter_password'];?></span><br />
                    <input type="password" id="userPwdConfirm" name="userPwdConfirm" placeholder="<?php echo $languages[$lang]['re_enter_password'];?>" required/><br />
                    <table>
                        <tbody>
                            <tr>
                                <td><a class="profileBtn" href="dashboard.php"><?php echo $languages[$lang]['go_back'];?></a></td>
                                <td>&nbsp;</td>
                                <td><input type="submit" class="profileBtn" value="<?php echo $languages[$lang]['submit'];?>" /></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>

        </div>

        <footer>
        </footer>
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