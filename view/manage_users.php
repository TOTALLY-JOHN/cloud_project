<?php
    session_start();
    if (!isset($_SESSION['username']) || $_SESSION['userRole'] != "admin") {
        header('location: login.php');
    }

    /// [CONNECT THE DASHBOARD CONTROLLER]
    require_once('../controller/profile_controller.php');
    include('../lib/common/languages.php');
    $controllers = new ProfileController();
    $data = $controllers->getAllProfiles();
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
        <!-- <link rel="stylesheet" href="../lib/styles/dashboard_style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"> -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
        <!-- Nucleo Icons -->
        <link href="../lib/assets/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link href="../lib/assets/css/black-dashboard.css" rel="stylesheet" />
        <title>Tech Army</title>
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

        #createVMBtn {
            height: 40px;
        }

        #searchUser {
            height: 40px; 
            border: 2px solid black; 
            border-radius: 5px; 
            padding: 5px;
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
        .nav li p {
            font-size: 15px;
        }
    </style>
    </head>
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
                        <li class="active">
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
                    <li>
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
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"><?php echo $languages[$lang]['manage_users'];?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Users</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <?php echo $languages[$lang]['manage_users_message'];?>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table style="width:100%">
                                    <tr>
                                        <td style="text-align:right;">
                                            <input type="text" name="searchUser" id="searchUser" placeholder="Search User..."/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card mb-4" style="overflow-x: auto;">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <th class="vm_table_header"><?php echo $languages[$lang]['username'];?></th>
                                        <th class="vm_table_header"><?php echo $languages[$lang]['user_role'];?></th>
                                        <th class="vm_table_header"><?php echo $languages[$lang]['request_change_password'];?></th>
                                        <th class="vm_table_header"><?php echo $languages[$lang]['actions'];?></th>
                                    </thead>
                                    <tbody id="userTable">
                                        <?php
                                            while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['userRole']; ?></td>
                                                <td><?php echo $row['forgotPwd'] == 0 ? "No" : "Yes"; ?></td>
                                                <td>
                                                    <a href="allow_change_password.php?username=<?php echo $row['username'];?>" class="btn btn-primary"><?php echo $languages[$lang]['allow'];?></a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
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
                $(document).ready(function() {
                $("#searchUser").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#userTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
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