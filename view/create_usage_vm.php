<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}

/// [CONNECT THE DASHBOARD CONTROLLER]
require_once('../controller/dashboard_controller.php');
include('../lib/common/languages.php');
$controllers = new DashboardController();
$uuid = $_GET["uuid"];
//! LANGUAGE SETTINGS
$lang = $_SESSION['userLanguage'] ?? "en";
?>
<DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../lib/styles/dashboard_style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script>
			$(document).ready(function() {
				<?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $queryResult = $controllers->createVirtualMachineUsage();
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
        <title>Tech Army</title>
    </head>
    <style>
        body {
            background-size: 100% 900px;
            background-repeat: no-repeat;
        }

        #updateContainer {
            width: 70%;
            height: 800px;
            padding: 1em;
            margin: 2em auto 2em auto;
            background-color: white;
            border-radius: 25px;
        }

        #logoImageContainer {
            text-align: center;
        }

        #logoImage {
            width: 200px;
        }

        #updateHeader {
            font-size: 2.5em;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            text-align: center;
        }

        #updateBodyContainer {
            width: 85%;
            margin: 0px auto 0px auto;
        }

        .updateLabel {
            font-size: 1.0em;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

        }

        input[type=email],
        input[type=text],
        input[type=password],
        input[type=date],
        input[type=number] {
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
        input[type=password]:focus,
        input[type=date]:focus,
        input[type=number]:focus {
            border-radius: 25px;
            background-color: #eeeeee;
            outline: none;
        }

        .createBtn {
            background-image: linear-gradient(to right, #4776E6 0%, #8E54E9 51%, #4776E6 100%)
        }

        .createBtn {
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

        .createBtn:hover {
            background-position: right center;
            color: #fff;
            text-decoration: none;
        }
    </style>

    <body style="background-image: url('../images/bg-01.jpg');">
        <div id="updateContainer">
            <div id="logoImageContainer">
                <img id="logoImage" src="../images/techlogo1.png" alt="tech_army_logo"/>
            </div><br />
            <div id="updateBodyContainer">
                <form method="post" autocomplete="off">
                    <span class="vmLabel">UUID</span><br />
                    <input type="text" id="vmUUID" name="vmUUID" placeholder="VM UUID" value="<?php echo $uuid;?>" readonly/><br />

                    <span class="vmLabel"><?php echo $languages[$lang]['usage_date'];?></span><br />
                    <input type="date" id="usageDate" name="usageDate" placeholder="<?php echo $languages[$lang]['usage_date'];?>" required/><br />

                    <span class="vmLabel"><?php echo $languages[$lang]['cpu_usage'];?></span><br />
                    <input type="number" id="cpuUsed" name="cpuUsed" placeholder="<?php echo $languages[$lang]['cpu_usage'];?>" required/><br />

                    <span class="vmLabel"><?php echo $languages[$lang]['memory_usage'];?></span><br />
                    <input type="number" id="memoryUsed" name="memoryUsed" placeholder="<?php echo $languages[$lang]['memory_usage'];?>" required/><br /><br />
                    
                    <input type="submit" class="createBtn" value="<?php echo $languages[$lang]['create'];?>" /><br />
                    <p style="text-align:center;"><a href="usage_vm.php?uuid=<?php echo $uuid;?>">Go Back</a></p>
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
						<p><?php echo $languages[$lang]['successfully_created'];?></p>
					</div>
					<div class="modal-footer">
                        <a href="dashboard_vm.php" class="btn btn-danger" data-dismiss="modal"><?php echo $languages[$lang]['close'];?></a>
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
						<p><?php echo $languages[$lang]['failed_to_create'];?></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $languages[$lang]['close'];?></button>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>