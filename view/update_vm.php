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
$row = $controllers->getVirtualMachine($uuid);
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
                        $queryResult = $controllers->updateVirtualMachine();
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
            background-size: 100% 1600px;
            background-repeat: no-repeat;
        }

        #updateContainer {
            width: 70%;
            height: 1500px;
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

        .updateBtn {
            background-image: linear-gradient(to right, #4776E6 0%, #8E54E9 51%, #4776E6 100%)
        }

        .updateBtn {
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

        .updateBtn:hover {
            background-position: right center;
            color: #fff;
            text-decoration: none;
        }

        .nav li p {
            font-size: 15px;
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
                    <input type="text" id="vmUUID" name="vmUUID" placeholder="VM UUID" value="<?php echo $row['uuid'];?>" readonly/><br />

                    <span class="vmLabel"><?php echo $languages[$lang]['domain_name'];?></span><br />
                    <input type="text" id="domainName" name="domainName" placeholder="<?php echo $languages[$lang]['domain_name'];?>" value="<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') echo $row['domainName'];?>" required/><br />

                    <span class="vmLabel"><?php echo $languages[$lang]['storage_capacity'];?></span><br />
                    <input type="text" id="storageCapacity" name="storageCapacity" placeholder="<?php echo $languages[$lang]['storage_capacity'];?>" value="<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') echo $row['storageCapacity'];?>" required/><br />

                    <span class="vmLabel"><?php echo $languages[$lang]['storage_allocation'];?></span><br />
                    <input type="text" id="storageAllocation" name="storageAllocation" placeholder="<?php echo $languages[$lang]['storage_allocation'];?>" value="<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') echo $row['storageAllocation'];?>" required/><br />
                    
                    <span class="vmLabel"><?php echo $languages[$lang]['storage_available'];?></span><br />
                    <input type="text" id="storageAvailable" name="storageAvailable" placeholder="<?php echo $languages[$lang]['storage_available'];?>" value="<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') echo $row['storageAvailable'];?>" required/><br />

                    <span class="vmLabel"><?php echo $languages[$lang]['memory_allocation'];?></span><br />
                    <input type="text" id="memoryAllocation" name="memoryAllocation" placeholder="<?php echo $languages[$lang]['memory_allocation'];?>" value="<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') echo $row['memoryAllocation'];?>" required/><br />

                    <span class="vmLabel"><?php echo $languages[$lang]['cpu_allocation'];?></span><br />
                    <input type="text" id="cpuAllocation" name="cpuAllocation" placeholder="<?php echo $languages[$lang]['cpu_allocation'];?>" value="<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') echo $row['cpuAllocation'];?>" required/><br />

                    <span class="vmLabel"><?php echo $languages[$lang]['device_type'];?></span><br />
                    <input type="text" id="deviceType" name="deviceType" placeholder="<?php echo $languages[$lang]['device_type'];?>" value="<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') echo $row['deviceType'];?>" required/><br />

                    <span class="vmLabel"><?php echo $languages[$lang]['source_path'];?></span><br />
                    <input type="text" id="sourcePath" name="sourcePath" placeholder="<?php echo $languages[$lang]['source_path'];?>" value="<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') echo $row['sourcePath'];?>" required/><br />

                    <span class="vmLabel"><?php echo $languages[$lang]['storage_format'];?></span><br />
                    <input type="text" id="storageFormat" name="storageFormat" placeholder="<?php echo $languages[$lang]['storage_format'];?>" value="<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') echo $row['storageFormat'];?>" required/><br />

                    <span class="vmLabel"><?php echo $languages[$lang]['status'];?></span><br />
                    <input type="text" id="status" name="status" placeholder="<?php echo $languages[$lang]['status'];?>" value="<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') echo $row['status'];?>" required/><br /><br />

                    <input type="submit" class="updateBtn" value="<?php echo $languages[$lang]['update'];?>" /><br />
                    <p style="text-align:center;"><a href="dashboard_vm.php"><?php echo $languages[$lang]['go_back'];?></a></p>
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