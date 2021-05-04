<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
/// [CONNECT THE DASHBOARD CONTROLLER]
require_once('../controller/dashboard_controller.php');
include('../lib/common/languages.php');
$controllers = new DashboardController();
$data = $controllers->getAllVirtualMachinesSummary();

//! LANGUAGE SETTINGS
$lang = $_SESSION['userLanguage'] ?? "en";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lang = $_POST["lang"];
    $_SESSION['userLanguage'] = $lang;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
        <title>Tech Army</title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
        <!-- Nucleo Icons -->
        <link href="../lib/assets/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link href="../lib/assets/css/black-dashboard.css" rel="stylesheet" />
    </head>
    

    <style>
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
        .nav li p {
            font-size: 15px;
        }
    </style>

    <body class="">
        <div class="wrapper">
            <div class="sidebar">
                <div class="sidebar-wrapper">
                    <div class="logo">
                    <a href="dashboard.php" class="simple-text logo-mini">
                        <strong>T</strong> <strong>A</strong>
                    </a>
                    <a href="dashboard.php" class="simple-text logo-normal">
                        TechArmy
                    </a>
                    </div>
                    <ul class="nav"> 
                    <?php
                        if ($_SESSION['userRole'] == "admin") {
                    ?>
                        <li>
                            <a href="./manage_users.php">
                            <i class="fas fa-users-cog"></i>
                            <p> <?php echo $languages[$lang]['manage_users'];?> </p>
                            </a>
                        </li>
                        <li>
                            <a href="./manage_cases.php">
                            <i class="fas fa-cogs"></i>
                            <p> <?php echo $languages[$lang]['manage_cases'];?> </p>
                            </a>
                        </li>
                    <?php
                        }
                    ?>
                    <li class="active">
                        <a href="./dashboard.php">
                        <i class="fas fa-tachometer-alt"></i>
                        <p><?php echo $languages[$lang]['dashboard'];?></p>
                        </a>
                    </li>
                    <li>
                        <a href="./dashboard_cpu.php">
                        <i class="fa fa-microchip" aria-hidden="true"></i>
                        <p>CPU</p>
                        </a>
                    </li>
                    <li>
                        <a href="./dashboard_memory.php">
                        <i class="fas fa-database"></i>
                        <p><?php echo $languages[$lang]['memory'];?></p>
                        </a>
                    </li>
                    <li>
                        <a href="./dashboard_disk.php">
                        <i class="fas fa-hdd"></i>
                        <p>HDD / SSD</p>
                        </a>
                    </li>
                    <li>
                        <a href="./dashboard_vm.php">
                        <i class="fas fa-server"></i>
                        <p> <?php echo $languages[$lang]['virtual_machines'];?> </p>
                        </a>
                    </li>
                    <?php
                        if ($_SESSION['userRole'] != "admin") {
                    ?>
                        <li>
                            <a href="./change_profile.php">
                            <i class="tim-icons icon-single-02"></i>
                            <p> <?php echo $languages[$lang]['change_profile'];?> </p>
                            </a>
                        </li>
                        <li>
                            <a href="./help.php">
                            <i class="fas fa-question-circle"></i>
                            <p> <?php echo $languages[$lang]['help'];?> </p>
                            </a>
                        </li>
                        <li>
                            <a href="./cases.php">
                            <i class="tim-icons icon-settings"></i>
                            <p> <?php echo $languages[$lang]['my_cases'];?> </p>
                            </a>
                        </li>
                    <?php
                        }
                    ?>
                    <li>
                        <a href="./about.php">
                        <i class="tim-icons icon-puzzle-10"></i>
                        <p> <?php echo $languages[$lang]['about_us'];?> </p>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle d-inline">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                        </div>
                        <a class="navbar-brand" href="dashboard.php">Cloud Analytics</a> <!-- :void(0) to prevent the page from refreshing -->
                        </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto">
                        <li>
                            <input type="checkbox" class="checkbox" id="checkbox">
                            <label for="checkbox" class="label_theme">
                                <i class="fas fa-sun"></i>
                                <i class="fas fa-moon"></i>
                                <div class="ball"></div>
                            </label>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            
                            <div class="photo">
                                <img src="../lib/assets/img/languages_icon.png" alt="Language Translation">
                                <i class="fa fa-language" aria-hidden="true"></i>
                            </div>
                            <b class="caret d-none d-lg-block d-xl-block"></b>
                            <p class="d-lg-none">
                                <?php echo $languages[$lang]['language'];?>
                            </p>
                            </a>
                            <ul class="dropdown-menu dropdown-navbar">
                                <li class="nav-link">
                                    <form method="post">
                                        <input type="hidden" name="lang" value="en"/>
                                        <input class="nav-item dropdown-item" type="submit" value="<?php echo $languages[$lang]['english'];?>">
                                    </form>
                                </li>
                                <li class="nav-link">
                                    <form method="post">
                                        <input type="hidden" name="lang" value="cn"/>
                                        <input class="nav-item dropdown-item" type="submit" value="<?php echo $languages[$lang]['chinese'];?>"/>
                                    </form>
                                </li>
                                <li class="nav-link">
                                    <form method="post">
                                        <input type="hidden" name="lang" value="my"/>
                                        <input class="nav-item dropdown-item" type="submit" value="<?php echo $languages[$lang]['malay'];?>"/>
                                    </form>
                                </li>
                                <li class="nav-link">
                                    <form method="post">
                                        <input type="hidden" name="lang" value="kr"/>
                                        <input class="nav-item dropdown-item" type="submit" value="<?php echo $languages[$lang]['korean'];?>"/>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <div class="photo">
                                <img src="../lib/assets/img/anime3.png" alt="Profile Photo">
                            </div>
                            <b class="caret d-none d-lg-block d-xl-block"></b>
                            <p class="d-lg-none">
                                User
                            </p>
                            </a>
                            <ul class="dropdown-menu dropdown-navbar">
                                <li class="nav-link">
                                    <p class="nav-item dropdown-item "> 
                                        <?php echo $languages[$lang]['hi'];?>, 
                                        <?php echo $_SESSION['username'];?> 
                                        <?php 
                                        if ($_SESSION['userLanguage'] == "kr") {
                                            echo "님";
                                        } 
                                        ?>
                                    </p>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li class="nav-link">
                                    <a href="./logout.php" class="nav-item dropdown-item"><?php echo $languages[$lang]['logout'];?> &nbsp;<i class="fas fa-sign-out-alt"></i></a>
                                </li>
                            </ul>
                        </li>
                        <li class="separator d-lg-none"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <a href="dashboard_cpu.php" class="btn btn-info">
                                <h4><i class="fa fa-microchip" aria-hidden="true"></i> <br> CPU</h4>
                                <hr />
                                <h6 id="viewDetailsLabel1"><?php echo $languages[$lang]['view_details'];?>
                    
                                </h6>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <a href="dashboard_memory.php" class="btn btn-success">
                                <h4 id="memoryHeaderLabel"><i class="fas fa-database"></i> <br> <?php echo $languages[$lang]['memory'];?></h4>
                                    <hr />
                                <h6 id="viewDetailsLabel2"><?php echo $languages[$lang]['view_details'];?> 
                                   
                                </h6>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <a href="dashboard_disk.php" class="btn btn-primary">
                                <h4> <i class="fas fa-hdd"></i> <br> HDD/SSD</h4>
                                <hr />
                                <h6 id="viewDetailsLabel3"><?php echo $languages[$lang]['view_details'];?>
                                        
                                </h6>
                            </a>
                    
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <a href="dashboard_vm.php" class="btn btn-danger">
                                <h4 id="virtualMachinesHeaderLabel"><i class="fas fa-server"></i> <br> <?php echo $languages[$lang]['virtual_machines'];?></h4><hr />
                                <h6 id="viewDetailsLabel4"><?php echo $languages[$lang]['view_details'];?>
                                        
                                </h6>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="card ">
                        <div class="card-header">
                            <h4 class="card-title"> Dashboard Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class ="table">
                                    <thead>
                                        <tr>
                                            <th>UUID</th>
                                            <th><?php echo $languages[$lang]['domain_name'];?></th>
                                            <th><?php echo $languages[$lang]['average_cpu_usage'];?></th>
                                            <th><?php echo $languages[$lang]['average_memory_usage'];?></th>
                                            <th><?php echo $languages[$lang]['status'];?></th>
                                        </tr>
                                    </thead>
                                    <tbody id="summaryTable">
                                        <?php
                                            while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['uuid']; ?></td>
                                                <td><?php echo $row['domainName']; ?></td>
                                                <td><?php echo number_format($row['cpuAvg'], 2); ?>m</td>
                                                <td><?php echo number_format($row['memoryAvg'] / 1000, 2); ?>mib</td>
                                                <td><?php echo $row['status']; ?></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="footer">
                <div class="container-fluid">
                <div class="copyright">
                    <script>
                    document.write(new Date().getFullYear())
                    </script> &copy; Cloud Analytics provided by Tech Army.
                </div>
                </div>
            </footer>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="../lib/assets/js/core/jquery.min.js"></script>
        <script src="../lib/assets/js/core/popper.min.js"></script>
        <script src="../lib/assets/js/core/bootstrap.min.js"></script>
        <script src="../lib/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Chart JS
        <script src="../lib/assets/js/plugins/chartjs.min.js"></script> -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../lib/assets/js/black-dashboard.min.js"></script>
        <script>
            
            /* --- CHANGE THEME MODE --- */
            $('#checkbox').change(function(){
                if($(this).is(":checked")) {
                    $('body').addClass('change-background');
                        setTimeout(function() {
                        $('body').removeClass('change-background');
                        $('body').addClass('white-content');
                        }, 100);
                    } else {
                    $('body').addClass('change-background');
                        setTimeout(function() {
                        $('body').removeClass('change-background');
                        $('body').removeClass('white-content');
                        }, 100);
                }
            });


            $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');
                $navbar = $('.navbar');
                $main_panel = $('.main-panel');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');
                sidebar_mini_active = true;

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                var $btn = $(this);

                if (sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    sidebar_mini_active = false;
                    blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                } else {
                    $('body').addClass('sidebar-mini');
                    sidebar_mini_active = true;
                    blackDashboard.showSidebarMessage('Sidebar mini activated...');
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);
                });
            });
            });
        </script>
    </body>
</html>