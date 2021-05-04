<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
//! LANGUAGE SETTINGS
include('../lib/common/languages.php');
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
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
        <!-- Nucleo Icons -->
        <link href="../lib/assets/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link href="../lib/assets/css/black-dashboard.css" rel="stylesheet" />
        <title>Tech Army</title>
    </head>

    <style>
        input 
        {
          border: 1px solid transparent;
          background-color: #f1f1f1;
          padding: 10px;
          font-size: 16px;
          margin-left:12px;
        }

        /* Set the size of the div element that contains the map */
        #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
        }

        #containerLogo
        {
          display: grid;
          grid-template-columns: auto auto auto;
          grid-template-rows: 80px 160px;
          grid-gap: 10px;
          padding: 10px;
          color:white;

        }

        /* CONTACTS */
        .contact-box {
        padding: 20px;
        margin-bottom: 20px;

        }
        .contact-box > a {
        color: inherit;
        }
        .contact-box.center-version {
        padding: 0;
        }
        .contact-box.center-version > a {
        display: block;
        padding: 20px;
        text-align: center;
        }
        .contact-box.center-version > a img {
        width: 80px;
        height: 80px;
        margin-top: 10px;
        margin-bottom: 10px;
        }
        .contact-box.center-version address {
        margin-bottom: 0;
        }
        .contact-box .contact-box-footer {
        text-align: center;
        padding: 15px 20px;
        }
        a{
            text-decoration:none !important;    
        }
        .container
        {
            padding: 20px;
            border-radius: 3px;
            margin-bottom: 30px;
            border-radius: 40px;
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
                        <li class="active">
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
                      <h1 class="mt-4"><?php echo $languages[$lang]['contact_us'];?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contact Us</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-3">
                                            <div class="contact-box center-version" style="text-align:center;">
                                                <img alt="image" class="img-circle" src="../lib/assets/img/fyp_member_picture/jihwan.png" style="width:80%;"><br /><br />
                                                <h3 class="m-b-xs"><strong>Jihwan Jeong</strong></h3>
                                                <p><?php echo $languages[$lang]['project_manager'];?></p><br />
                                                <p>wnaks5945@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="contact-box center-version" style="text-align:center;">
                                                <img alt="image" class="img-circle" src="../lib/assets/img/fyp_member_picture/junhong.png" style="width:80%;"><br /><br />
                                                <h3 class="m-b-xs"><strong>Tan Jun Hong</strong></h3>
                                                <p><?php echo $languages[$lang]['lead_programmer'];?>, <?php echo $languages[$lang]['quality_assurance'];?></p><br />
                                                <p>tanjunhong4d@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="contact-box center-version" style="text-align:center;">
                                                <img alt="image" class="img-circle" src="../lib/assets/img/fyp_member_picture/yikai.png" style="width:80%;"><br /><br />
                                                <h3 class="m-b-xs"><strong>Lee Yi Kai</strong></h3>
                                                <p><?php echo $languages[$lang]['lead_programmer'];?>, <?php echo $languages[$lang]['analyst'];?></p><br />
                                                <p>yikailee0120@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="contact-box center-version" style="text-align:center;">
                                                <img alt="image" class="img-circle" src="../lib/assets/img/fyp_member_picture/suethui.png" style="width:80%;"><br /><br />
                                                <h3 class="m-b-xs"><strong>Lee Suet Hui</strong></h3>
                                                <p><?php echo $languages[$lang]['ui_ux_developer'];?></p><br />
                                                <p>sharonsuet988@gmail.com</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4" style="overflow-x: auto;">
                            <div class="card-body">
                                <div style="padding: 10px">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.0757713853427!2d101.58901761470446!3d3.0744364977611744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4c5f8bdfaba7%3A0x31aac7ab1af0abc!2sINTI%20International%20College%20Subang!5e0!3m2!1sen!2smy!4v1617431323703!5m2!1sen!2smy" style="width:100%;" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
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