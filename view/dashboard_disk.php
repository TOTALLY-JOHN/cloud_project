<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
/// [CONNECT THE DASHBOARD CONTROLLER]
require_once('../controller/dashboard_controller.php');
include('../lib/common/languages.php');
$controllers = new DashboardController();
$data = $controllers->getAllVirtualMachines();
//! LANGUAGE SETTINGS
$lang = $_SESSION['userLanguage'] ?? "en";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lang = $_POST["lang"];
    $_SESSION['userLanguage'] = $lang;
}
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
        <title>Disk Usage</title>
        <script>
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#diskTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
        </script>
    </head>

    <style>
        .searchBar
        {
          margin-top: 4px;
          margin-right: 16px;
          margin-bottom: 100px;
        }

        #myInput 
        {
          background-image: url('/css/searchicon.png');
          background-position: 10px 10px;
          background-repeat: no-repeat;
          float:right;
          width: 40%;
          font-size: 16px;
          padding: 12px 20px 12px 30px;
          border: 2px solid black;
          margin-bottom: 12px;
        }

        #languageLabel {
            color: white;
        }
        .dropdownInputItem {
            padding: 12px;
            background-color: white;
            border: none;
            width: 155px;
            height: 50px;
            text-align: left;
        }
        .dropdownInputItem:hover {
            background-color: #eeeeee;
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
                <li class="nav-item">
                	<div class="dropdown btn-group">
	                    <a class="btn dropdown-toggle" data-toggle="dropdown" id="languageLabel">
                            <?php echo $languages[$lang]['language'];?>
	                    </a>
	                    <ul id="language" class="dropdown-menu">
                            <li>
                                <div class="langDropdownItem">
                                    <form method="post">
                                        <input type="hidden" name="lang" value="en"/>
                                        <input class="dropdownInputItem" type="submit" value="<?php echo $languages[$lang]['english'];?>">
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="langDropdownItem">
                                    <form method="post">
                                        <input type="hidden" name="lang" value="cn"/>
                                        <input class="dropdownInputItem" type="submit" value="<?php echo $languages[$lang]['chinese'];?>"/>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="langDropdownItem">
                                    <form method="post">
                                        <input type="hidden" name="lang" value="my"/>
                                        <input class="dropdownInputItem" type="submit" value="<?php echo $languages[$lang]['malay'];?>"/>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="langDropdownItem">
                                    <form method="post">
                                        <input type="hidden" name="lang" value="kr"/>
                                        <input class="dropdownInputItem" type="submit" value="<?php echo $languages[$lang]['korean'];?>"/>
                                    </form>
                                </div>
                            </li>
	                    </ul>
	                </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item" >
                    <a class="nav-link" href="logout.php" role="button">
                        <i class="fas fa-sign-out-alt"></i>
                        <span id="logoutLabel"><?php echo $languages[$lang]['logout'];?></span>
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
                                <span id="currentUserLabel">&nbsp; <?php echo $languages[$lang]['hi'];?></span>, <?php echo $_SESSION['username'];?>
                                <span id="koreanHiLabelAdd">
                                <?php 
                                    if ($_SESSION['userLanguage'] == "kr") {
                                        echo "님";
                                    } 
                                ?>
                                </span>
                            </a>
                            <?php
                                if ($_SESSION['userRole'] == "admin") {
                            ?>
                                <a href="manage_users.php" class="nav-link" style="color:white;">
                                    <div id="manageUsersLabel" class="sb-nav-link-icon" style="color:white;" >
                                        <?php echo $languages[$lang]['manage_users'];?>
                                    </div>
                                </a>
                                <a href="manage_cases.php" class="nav-link" style="color:white;">
                                    <div id="manageCasesLabel" class="sb-nav-link-icon" style="color:white;" >
                                        <?php echo $languages[$lang]['manage_cases'];?>
                                    </div>
                                </a>
                            <?php
                                }
                            ?>
                            <br />
                            <a class="nav-link" href="dashboard.php" style="color:white; ">
                                <div class="sb-nav-link-icon" style="color:white;" ><i class="fas fa-tachometer-alt"></i></div>
                                <span id="dashboardMenuLabel"><?php echo $languages[$lang]['dashboard'];?></span>
                            </a>
                            <div class="sb-sidenav-menu-heading" id="appliancesMenuLabel"><?php echo $languages[$lang]['appliances'];?></div>
                            <a class="nav-link" href="dashboard_cpu.php" style="color:white;">
                                <span>CPU</span>
                            </a>
                            <a class="nav-link" href="dashboard_memory.php" style="color:white;">
                                <span id="memoryMenuLabel"><?php echo $languages[$lang]['memory'];?></span>
                            </a>
                            <a class="nav-link" href="dashboard_disk.php" style="color:white;">
                                HDD/SSD
                            </a>
                            <a class="nav-link" href="dashboard_vm.php" style="color:white;">
                                <span id="virtualMachinesMenuLabel" ><?php echo $languages[$lang]['virtual_machines'];?></span>
                            </a>
                            <?php
                                if ($_SESSION['userRole'] != "admin") {
                            ?>
                            <div class="sb-sidenav-menu-heading" id="userMenuLabel"><?php echo $languages[$lang]['users'];?></div>
                            <a id="changeProfileMenuLabel" class="nav-link" href="change_profile.php" style="color:white;">
                                <?php echo $languages[$lang]['change_profile'];?>
                            </a>
                            <a id="helpMenuLabel" class="nav-link" href="help.php" style="color:white;">
                                <?php echo $languages[$lang]['help'];?>
                            </a>
                            <a id="myCasesMenuLabel" class="nav-link" href="cases.php" style="color:white;">
                                <?php echo $languages[$lang]['my_cases'];?>
                            </a>
                            <?php
                                }
                            ?>
                            <hr />
                            <a id="aboutUsMenuLabel" class="nav-link" href="about.php" style="color:white;">
                                <?php echo $languages[$lang]['about_us'];?>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">HDD/SSD</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">HDD/SSD</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <?php echo $languages[$lang]['disk_summary'];?>
                            </div>
                        </div>
                    </div>
                    <div class="searchBar">
                        <input type="text" id="myInput" placeholder="<?php echo $languages[$lang]['search_for_disk'];?>">
                    </div>
                    <div class="table-responsive">
                        <table class ="table">
                            <thead>
                                <tr>
                                    <th>UUID</th>
                                    <th><?php echo $languages[$lang]['device_type'];?></th>
                                    <th><?php echo $languages[$lang]['storage_capacity'];?></th>
                                    <th><?php echo $languages[$lang]['storage_allocation'];?></th>
                                    <th><?php echo $languages[$lang]['storage_available'];?></th>
                                    <th><?php echo $languages[$lang]['storage_format'];?></th>
                                </tr>
                            </thead>
                            <tbody id="diskTable">
                                <?php
                                    while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['uuid']; ?></td>
                                        <td><?php echo $row['deviceType']; ?></td>
                                        <td><?php echo $row['storageCapacity']; ?></td>
                                        <td><?php echo $row['storageAllocation']; ?></td>
                                        <td><?php echo $row['storageAvailable']; ?></td>
                                        <td><?php echo $row['storageFormat']; ?></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </main>
                <footer class="container-fluid text-center">
                    <p>Copyright 2021 &copy; Cloud Analytics provided by Tech Army</p>
                </footer>
            </div>
        </div>
    </body>
</html>