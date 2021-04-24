<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
/// [CONNECT THE DASHBOARD CONTROLLER]
require_once('../controller/dashboard_controller.php');
$controllers = new DashboardController();
$uuid = $_GET["uuid"];
$data = $controllers->getVirtualMachineUsage($uuid);
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
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
        <script>
            $(document).ready(function() {
                $("#searchVMUsage").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#usageTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
        </script>

        <title>VM Usage</title>
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

        .material-icons-outlined {
            transform: scale(1.5);
        }

        .vm_table_header {
            background-color: #eeeeee;
            font-weight: bold;
        }

    </style>
    </head>

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
                    <h1 class="mt-4">Virtual Machines Usage</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Virtual Machines Usage</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            Virtual Machines Usage Details
                            </div>
                        </div>
                        <div class="card mb-4" style="width: 100%; height: 600px; overflow-x: scroll; overflow-y: scroll;">
                        <div style="margin: 15px;">
                            <table>
                                <tr>
                                    <td>
                                        <div style="margin:10px;">
                                            <a href="create_usage_vm.php?uuid=<?php echo $_GET["uuid"];?>" class="btn btn-primary" style="height: 40px;">Add Usage +</a> &nbsp;
                                        </div>    
                                    </td>
                                    <td>
                                        <div style="margin:13px;">
                                            <form method="post" action="export_vm_usage.php">
                                                <input type="hidden" name="uuid" value="<?php echo $_GET['uuid'];?>"/>
                                                <input id="downloadBtn" type="submit" class="btn btn-success" name="export_vm_usage" value="Download Report as Excel"/>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="margin:2px;">
                                            <input type="text" name="searchVMUsage" id="searchVMUsage" placeholder="Search Usage..." style="height: 36px;"/>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <th class="vm_table_header">UUID</th>
                                <th class="vm_table_header">Usage Date</th>
                                <th class="vm_table_header">CPU Usage</th>
                                <th class="vm_table_header">Memory Usage</th>
                                <th class="vm_table_header">Actions</th>
                            </thead>
                            <tbody id="usageTable">
                                <?php
                                    while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['uuid']; ?></td>
                                        <td><?php echo $row['usageDate']; ?></td>
                                        <td><?php echo $row['cpuUsed']; ?></td>
                                        <td><?php echo $row['memoryUsed']; ?></td>
                                        <td>
                                            <a href="update_usage_vm.php?usageID=<?php echo $row['usageID'];?>" class="btn btn-success">Edit</a>
                                            <a href="delete_usage_vm.php?usageID=<?php echo $row['usageID'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </main>
                <footer class="container-fluid text-center">
                    <p>Copyright 2021 &copy; Cloud Analytics provided by Tech Army</p>
                </footer>
            </div>
        </div>

    </body>

    </html>