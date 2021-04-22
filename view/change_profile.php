<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('location: login.php');
    }
    require_once('../controller/profile_controller.php');
    $controllers = new ProfileController();
    $username = $_SESSION['username'];
    $row = $controllers->getProfile($username);
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
            <h1 id="profileHeader">Profile Change</h1>
            <div id="profileBodyContainer">
                <form method="post" autocomplete="off">
                <span class="profileLabel">Username</span><br />
                    <input type="text" id="username" name="username" placeholder="Type your username" value="<?php echo $row['username'];?>" readonly/><br />
                    <span class="profileLabel">User Email</span><br />
                    <input type="text" id="userEmail" name="userEmail" placeholder="Type your email" value="<?php echo $row['userEmail'];?>" required/><br />
                    <span class="profileLabel">New Password</span><br />
                    <input type="password" id="userPwd" name="userPwd" placeholder="Type your password" required/><br />
                    <span class="profileLabel">Re-enter Password</span><br />
                    <input type="password" id="userPwdConfirm" name="userPwdConfirm" placeholder="Re-enter your password" required/><br />
                    <table>
                        <tbody>
                            <tr>
                                <td><a class="profileBtn" href="dashboard.php">Go Back</a></td>
                                <td>&nbsp;</td>
                                <td><input type="submit" class="profileBtn" value="Submit" /></td>
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
						<h4 class="modal-title">Success Message</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<p>Successfully updated!</p>
					</div>
					<div class="modal-footer">
                        <a href="dashboard.php" class="btn btn-danger" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>
		<div id="failureModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Error Message</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<p>Failed to change the profile.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>