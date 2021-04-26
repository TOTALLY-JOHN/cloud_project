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
echo $_SESSION['userRole'];
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
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
        <script>
            $(document).ready(function() {
                $("#searchVM").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#vmTable tr").filter(function() {
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
        
        #tableContainer {
            width: 100%; 
            height: 600px; 
            overflow-x: scroll; 
            overflow-y: scroll;
        }

        #searchVM {
            height: 40px; 
            border: 2px solid black; 
            border-radius: 5px; 
            padding: 5px;
        }

        #createVMBtn {
            height: 40px;
        }

        #downloadBtn {
            height: 40px;
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
                    <h1 class="mt-4"><?php echo $languages[$lang]['virtual_machines'];?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Virtual Machines</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <?php echo $languages[$lang]['virtual_machines_details'];?>
                            </div>
                        </div>
                        <div class="card mb-4" id="tableContainer">
                        <div style="margin: 15px;">
                            <table>
                                <tr>
                                    <td>
                                        <div style="margin:10px;">
                                            <a id="createVMBtn" href="create_vm.php" class="btn btn-primary"><?php echo $languages[$lang]['create_new_vm'];?> +</a>
                                        </div>    
                                    </td>
                                    <td>
                                        <div style="margin:13px;">
                                            <form method="post" action="export_vm.php">
                                                <input id="downloadBtn" type="submit" class="btn btn-success" name="export_vm" value="<?php echo $languages[$lang]['download_report_as_excel'];?>"/>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="margin:2px;">
                                            <input type="text" name="searchVM" id="searchVM" placeholder="<?php echo $languages[$lang]['search_for_vm'];?>..."/>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <table class="table table-bordered" style="width: 1800px;">
                            <thead>
                                <th class="vm_table_header">UUID</th>
                                <th class="vm_table_header"><?php echo $languages[$lang]['domain_name'];?></th>
                                <th class="vm_table_header"><?php echo $languages[$lang]['storage_allocation'];?></th>
                                <th class="vm_table_header"><?php echo $languages[$lang]['memory_allocation'];?></th>
                                <th class="vm_table_header"><?php echo $languages[$lang]['cpu_allocation'];?></th>
                                <th class="vm_table_header"><?php echo $languages[$lang]['device_type'];?></th>
                                <th class="vm_table_header"><?php echo $languages[$lang]['source_path'];?></th>
                                <th class="vm_table_header"><?php echo $languages[$lang]['storage_format'];?></th>
                                <th class="vm_table_header"><?php echo $languages[$lang]['actions'];?></th>
                            </thead>
                            <tbody id="vmTable">
                                <?php
                                    while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['uuid']; ?></td>
                                        <td><?php echo $row['domainName']; ?></td>
                                        <td><?php echo $row['storageAllocation']; ?></td>
                                        <td><?php echo $row['memoryAllocation']; ?></td>
                                        <td><?php echo $row['cpuAllocation']; ?></td>
                                        <td><?php echo $row['deviceType']; ?></td>
                                        <td><?php echo $row['sourcePath']; ?></td>
                                        <td><?php echo $row['storageFormat']; ?></td>
                                        <td>
                                            <a href="usage_vm.php?uuid=<?php echo $row['uuid'];?>" class="btn btn-primary"><?php echo $languages[$lang]['usage'];?></a>
                                            <a href="update_vm.php?uuid=<?php echo $row['uuid'];?>" class="btn btn-success"><?php echo $languages[$lang]['edit'];?></a>
                                            <a href="delete_vm.php?uuid=<?php echo $row['uuid'];?>" class="btn btn-danger" onclick="return confirm('<?php echo $languages[$lang]['delete_item'];?>');"><?php echo $languages[$lang]['delete'];?></a>
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
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script type="text/javascript">
            <?php
                $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
                $sql = "SELECT SUM(vm_usage.cpuUsed) AS cpuUsed, SUM(vm_usage.memoryUsed) AS memoryUsed, vm_usage.usageDate AS useDate FROM vm_details JOIN vm_usage ON vm_details.uuid = vm_usage.uuid GROUP BY vm_usage.usageDate";
                $result = mysqli_query($dbc, $sql);
                while($row = mysqli_fetch_array($result)) {
                    $dates[] = $row['useDate'];
                    $usage[] = $row['cpuUsed'];
                }
            ?>
            var ctx = document.getElementById("chartjs_bar").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels:<?php echo json_encode($dates); ?>,
                    datasets: [{
                        backgroundColor: [
                            "#5969ff",
                            "#ff407b",
                            "#25d5f2",
                            "#ffc750",
                            "#2ec551",
                            "#7040fa",
                            "#ff004e"
                        ],
                        data:<?php echo json_encode($usage); ?>,
                    }]
                },
                options: {
                        legend: {
                    display: false,
                    position: 'bottom',

                    labels: {
                        fontColor: '#71748d',
                        fontFamily: 'Circular Std Book',
                        fontSize: 14,
                    }
                },
            }
            });
        </script>
    </body>

    </html>