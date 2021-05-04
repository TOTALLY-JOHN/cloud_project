<?php
session_start();
// if (!isset($_SESSION['username'])) {
//     header('location: login.php');
// }

//! LANGUAGE SETTINGS
include('../lib/common/languages.php');
$lang = $_SESSION['userLanguage'] ?? "en";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lang = $_POST["lang"];
    $_SESSION['userLanguage'] = $lang;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Tech Army</title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
        <!-- Nucleo Icons -->
        <link href="../lib/assets/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link href="../lib/assets/css/black-dashboard.css" rel="stylesheet" />
    </head>
    <!-- <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Memory Usage</title>
        <link href="../lib/styles/dashboard_style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </head> -->

    <style>
        /* [ LOGO ]*/
        #logoImage {
            max-height: 300px;
            max-width: 300px;
            display: block;
            margin-left: auto;
            margin-right: auto;
                    
        }

        #intro-text {
            margin: 0 auto;
            max-width: 500px;
            height: 100px;
            padding: 30px;
            text-align: center;
            color: #b5bec1;
        }

        /* [ CONTENTS ] */
        /* Features */
        .features {
            display: -moz-flex;
            display: -webkit-flex;
            display: -ms-flex;
            display: flex;
            -moz-flex-wrap: wrap;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin: 0 0 2em -3em;
            width: calc(100% + 3em); 
        }
            .features article {
                -moz-align-items: center;
                -webkit-align-items: center;
                -ms-align-items: center;
                align-items: center;
                display: -moz-flex;
                display: -webkit-flex;
                display: -ms-flex;
                display: flex;
                margin: 0 0 3em 3em;
                position: relative;
                width: calc(50% - 3em); 
            }
                .features article:nth-child(2n - 1) {
                margin-right: 1.5em; 
            }
                .features article:nth-child(2n) {
                margin-left: 1.5em; 
                }
                .features article:nth-last-child(1), .features article:nth-last-child(2) {
                margin-bottom: 0; 
                }
                
                .features article .content_user {
                    -moz-flex-grow: 1;
                    -webkit-flex-grow: 1;
                    -ms-flex-grow: 1;
                    flex-grow: 1;
                    -moz-flex-shrink: 1;
                    -webkit-flex-shrink: 1;
                    -ms-flex-shrink: 1;
                    flex-shrink: 1;
                    width: 100%; 
                }
                .features article .content_user > :last-child {
                    margin-bottom: 0; 
                }
            @media screen and (max-width: 980px) {
                .features {
                    margin: 0 0 2em 0;
                    width: 100%; 
                }
                .features article {
                    margin: 0 0 3em 0;
                    width: 100%; 
                }
                    .features article:nth-child(2n - 1) {
                        margin-right: 0; }
                    .features article:nth-child(2n) {
                        margin-left: 0; }
                    .features article:nth-last-child(1), .features article:nth-last-child(2) {
                        margin-bottom: 3em; }
                    .features article:last-child {
                        margin-bottom: 0; }
            }
            @media screen and (max-width: 480px) {
                .features article {
                    -moz-flex-direction: column;
                    -webkit-flex-direction: column;
                    -ms-flex-direction: column;
                    flex-direction: column;
                    -moz-align-items: -moz-flex-start;
                    -webkit-align-items: -webkit-flex-start;
                    -ms-align-items: -ms-flex-start;
                    align-items: flex-start;
                }
            }
        .content_user {
                width: 77%;
                margin: 50px auto;
                font-family: 'Merriweather', serif;
                font-size: 17px;
                color: #6c767a;
                line-height: 1.9;
        }
        @media (min-width: 500px) {
                .content_user {
                    width: 43%;
                }
        }
        .content_user h3 {
                font-style: italic;
                color: #96a2a7;
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
                <a href="javascript:void(0)" class="simple-text logo-mini">
                    <strong>T</strong> <strong>A</strong>
                </a>
                <a href="javascript:void(0)" class="simple-text logo-normal">
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
                <li class="active ">
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
                <div class="col-md-12">
                    <div class="card card-plain">
                    <div class="card-header">
                        <?php echo $languages[$lang]['about_us'];?> 
                    </div>
                    <!-- Contents -->
                    <div class="card-body pb-5" >
                        <img id="logoImage" src="../lib/assets/img/techlogo1.png" alt="tech_army_logo" />
        
                        <div id="intro-text">
                            <i>- 
                                <?php echo $languages[$lang]['about_us_introduction'];?>
                            </i> 
                            <!-- <br>👦🏻👦🏻👦🏻👩🏻 -->
                        </div>

                    </div>
                    <div class="card-body pb5">
                        <div class="features">
                        <article>
                            <div class="content_user">
                            <img class="avatar" src="../lib/assets/img/fyp_member_picture/jihwan.png" alt="Jeong Jihwan">
                                <h3>Jeong Jihwan</h3>
                                <p>
                                    <?php echo $languages[$lang]['project_manager'];?>
                                    <br> 6193407 <br>
                                    <?php echo $languages[$lang]['information_technology'];?>
                                    (<?php echo $languages[$lang]['network_design_and_management'];?>) 
                                </p>
                            </div>
                        </article>

                        <article>
                            <div class="content_user">
                            <img class="avatar" src="../lib/assets/img/fyp_member_picture/junhong.png" alt="Tan Jun Hong">
                                <h3>Tan Jun Hong</h3>
                                    <p>
                                        <?php echo $languages[$lang]['lead_programmer'];?>,
                                        <?php echo $languages[$lang]['quality_assurance'];?>
                                        <br> 6336346 <br>
                                        <?php echo $languages[$lang]['computer_science'];?>
                                        (<?php echo $languages[$lang]['software_engineering'];?>)
                                    </p>
                            </div>
                        </article>
                        
                        <article>
                            <div class="content_user">
                            <img class="avatar" src="../lib/assets/img/fyp_member_picture/yikai.png" alt="Lee Yi Kai">
                                <h3>Lee Yi Kai</h3>
                                    <p>
                                        <?php echo $languages[$lang]['lead_programmer'];?>,
                                        <?php echo $languages[$lang]['analyst'];?>
                                        <br> 6291624 <br>
                                        <?php echo $languages[$lang]['computer_science'];?>
                                        (<?php echo $languages[$lang]['software_engineering_and_digital_system'];?>)
                                    </p>
                            </div>
                        </article>

                        <article>
                            <div class="content_user">
                            <img class="avatar" src="../lib/assets/img/fyp_member_picture/suethui.png" alt="Lee Suet Hui">
                                <h3>Lee Suet Hui</h3>
                                    <p>
                                        <?php echo $languages[$lang]['ui_ux_developer'];?>    
                                        <br> 6299027 <br>
                                        <?php echo $languages[$lang]['computer_science'];?>
                                        (<?php echo $languages[$lang]['software_engineering'];?>)
                                    </p>
                            </div>
                        </article>
                        </div>
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
        <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../lib/assets/js/black-dashboard.min.js"></script>
        <script>
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
