<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}

/// [CONNECT THE DASHBOARD CONTROLLER]
require_once('../controller/dashboard_controller.php');
$controllers = new DashboardController();
$uuid = $_GET["uuid"];

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
        <title>Create VM</title>
    </head>
    

    <style>
                /* Make sure that padding behaves as expected */
        * {box-sizing:border-box}

        /* Container for skill bars */
        .container {
          width: 100%; /* Full width */
          background-color: #ddd; /* Grey background */
        }

        .vm {
          text-align: right; /* Right-align text */
          padding-top: 10px; /* Add top padding */
          padding-bottom: 10px; /* Add bottom padding */
          color: white; /* White text color */
        }

        .one {width: 90%; background-color: #4CAF50;} /* Green */
        .two {width: 80%; background-color: #2196F3;} /* Blue */
        .three {width: 65%; background-color: #f44336;} /* Red */
        .four {width: 60%; background-color: #808080;} /* Dark Grey */
        .vmLabel {
            font-size: 1.0em;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        input[type=email],
        input[type=date],
        input[type=number],
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
        input[type=date]:focus,
        input[type=number]:focus,
        input[type=text]:focus,
        input[type=password]:focus {
            border-radius: 25px;
            background-color: #eeeeee;
            outline: none;
        }

        
        .createVMUsageBtn {
            background-image: linear-gradient(to right, #4776E6 0%, #8E54E9 51%, #4776E6 100%)
        }

        .createVMUsageBtn {
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

        .createVMUsageBtn:hover {
            background-position: right center;
            color: #fff;
            text-decoration: none;
        }
    </style>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="dashboard.php">TechArmy</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form> 
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item" >
                    <a class="nav-link" href="logout.php" role="button">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" style="color:white; ">
                                <div class="sb-nav-link-icon" style="color:white;" ><i class="fas fa-user"></i></div>
                                &nbsp; Hi, <?php echo $_SESSION['username'];?>
                            </a>
                            <?php
                                if ($_SESSION['userRole'] == "admin") {
                            ?>
                                <a href="manage_users.php" class="nav-link" style="color:white;">
                                    <div class="sb-nav-link-icon" style="color:white;" >
                                        Manage Users
                                    </div>
                                </a>
                                <a href="manage_cases.php" class="nav-link" style="color:white;">
                                    <div class="sb-nav-link-icon" style="color:white;" >
                                        Manage Cases
                                    </div>
                                </a>
                            <?php
                                }
                            ?>
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="dashboard.php" style="color:white; ">
                                <div class="sb-nav-link-icon" style="color:white;" ><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Appliances</div>
                            <a class="nav-link" href="dashboard_cpu.php" style="color:white;">
                                CPU
                            </a>
                            <a class="nav-link" href="dashboard_memory.php" style="color:white;">
                                Memory
                            </a>
                            <a class="nav-link" href="dashboard_disk.php" style="color:white;">
                                HDD/SSD
                            </a>
                            <a class="nav-link" href="dashboard_vm.php" style="color:white;">
                                Virtual Machines
                            </a>
                            <?php
                                if ($_SESSION['userRole'] != "admin") {
                            ?>
                            <div class="sb-sidenav-menu-heading">Users</div>
                            <a class="nav-link" href="change_profile.php" style="color:white;">
                                Change Profile
                            </a>
                            <a class="nav-link" href="help.php" style="color:white;">
                                Help
                            </a>
                            <a class="nav-link" href="cases.php" style="color:white;">
                                My Cases
                            </a>
                            <?php
                                }
                            ?>
                            <hr />
                            <a class="nav-link" href="about.php" style="color:white;">
                                About Us
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Virtual Machines</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">VM Usage</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Write previous virtual machine usage.
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form method="post" autocomplete="off">
                                    <span class="vmLabel">UUID</span><br />
                                    <input type="text" id="vmUUID" name="vmUUID" placeholder="Type VM UUID" value="<?php echo $uuid;?>" readonly/><br />

                                    <span class="vmLabel">Usage Date</span><br />
                                    <input type="date" id="usageDate" name="usageDate" placeholder="Select Usage Date" required/><br />

                                    <span class="vmLabel">CPU Usage</span><br />
                                    <input type="number" id="cpuUsed" name="cpuUsed" placeholder="Type VM CPU Used" required/><br />

                                    <span class="vmLabel">Memory Usage</span><br />
                                    <input type="number" id="memoryUsed" name="memoryUsed" placeholder="Type VM Memory Used" required/><br />
                                    
                                    <input type="submit" class="createVMUsageBtn" value="Create" /><br />
                                    <!-- <input type="submit" class="createVMBtn" value="SIGN UP" onclick="matchPassword(pwdInput1, pwdInput2)" /><br /> -->
                                </form>
                            </div>
                        </div>
                    
                    </div>
                </main>
                <footer class="container-fluid text-center">
                    <p>Copyright 2021 &copy; Cloud Analytics provided by Tech Army</p>
                </footer>
            </div>
        </div>
        <div id="successModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Success Message</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<p>Successfully created!</p>
					</div>
					<div class="modal-footer">
                        <a href="dashboard_vm.php" class="btn btn-danger" data-dismiss="modal">Close</a>
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
						<p>Failed to create a virtual machine usage.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
    </body>

    </html>