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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Memory Usage</title>
        <link href="../lib/styles/dashboard_style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </head>

    <style>
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
        width: calc(100% + 3em); }
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
            width: calc(50% - 3em); }
            .features article:nth-child(2n - 1) {
            margin-right: 1.5em; }
            .features article:nth-child(2n) {
            margin-left: 1.5em; }
            .features article:nth-last-child(1), .features article:nth-last-child(2) {
            margin-bottom: 0; }
            .features article .icon {
            -moz-flex-grow: 0;
            -webkit-flex-grow: 0;
            -ms-flex-grow: 0;
            flex-grow: 0;
            -moz-flex-shrink: 0;
            -webkit-flex-shrink: 0;
            -ms-flex-shrink: 0;
            flex-shrink: 0;
            display: block;
            height: 10em;
            line-height: 10em;
            margin: 0 2em 0 0;
            text-align: center;
            width: 10em; }
            .features article .icon:before {
                color: #f56a6a;
                font-size: 2.75rem;
                position: relative;
                top: 0.05em; }
            .features article .icon:after {
                -moz-transform: rotate(45deg);
                -webkit-transform: rotate(45deg);
                -ms-transform: rotate(45deg);
                transform: rotate(45deg);
                border-radius: 0.25rem;
                border: solid 2px rgba(210, 215, 217, 0.75);
                content: '';
                display: block;
                height: 7em;
                left: 50%;
                margin: -3.5em 0 0 -3.5em;
                position: absolute;
                top: 50%;
                width: 7em; }
            .features article .content {
            -moz-flex-grow: 1;
            -webkit-flex-grow: 1;
            -ms-flex-grow: 1;
            flex-grow: 1;
            -moz-flex-shrink: 1;
            -webkit-flex-shrink: 1;
            -ms-flex-shrink: 1;
            flex-shrink: 1;
            width: 100%; }
            .features article .content > :last-child {
                margin-bottom: 0; }
        @media screen and (max-width: 980px) {
            .features {
            margin: 0 0 2em 0;
            width: 100%; }
            .features article {
                margin: 0 0 3em 0;
                width: 100%; }
                .features article:nth-child(2n - 1) {
                margin-right: 0; }
                .features article:nth-child(2n) {
                margin-left: 0; }
                .features article:nth-last-child(1), .features article:nth-last-child(2) {
                margin-bottom: 3em; }
                .features article:last-child {
                margin-bottom: 0; }
                .features article .icon {
                height: 8em;
                line-height: 8em;
                width: 8em; }
                .features article .icon:before {
                    font-size: 2.25rem; }
                .features article .icon:after {
                    height: 6em;
                    margin: -3em 0 0 -3em;
                    width: 6em; } }
        @media screen and (max-width: 480px) {
            .features article {
            -moz-flex-direction: column;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            -moz-align-items: -moz-flex-start;
            -webkit-align-items: -webkit-flex-start;
            -ms-align-items: -ms-flex-start;
            align-items: flex-start; }
            .features article .icon {
                height: 6em;
                line-height: 6em;
                margin: 0 0 1.5em 0;
                width: 6em; }
                .features article .icon:before {
                font-size: 1.5rem; }
                .features article .icon:after {
                height: 4em;
                margin: -2em 0 0 -2em;
                width: 4em; } }
        @media screen and (max-width: 480px) {
            .features article .icon:before {
            font-size: 1.25rem; } }

            /* Section/Article */
            section.special, article.special {
            text-align: center; }

            /* Styles for the content section */
            .content {
                width: 77%;
                margin: 50px auto;
                font-family: 'Merriweather', serif;
                font-size: 17px;
                color: #6c767a;
                line-height: 1.9;
            }
            @media (min-width: 500px) {
            .content {
                width: 43%;
            }
            #button {
                margin: 30px;
            }
            }
            .content h3 {
                font-style: italic;
                color: #96a2a7;
            }

            p {
                margin: 0 0 2em 0; 
                color: black; }

            article,  section {
                display: block; }
            
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
                        <h1 class="mt-4"><?php echo $languages[$lang]['about_us'];?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">About Us</li>
                        </ol>
                        <div class="card-body pb-5" >
                            <img id="logoImage" src="../images/techlogo1.png" alt="tech_army_logo" />
							
                            <div id="intro-text">
                                <i><?php echo $languages[$lang]['about_us_introduction'];?></i> 
                            </div>
                            <!-- <hr style="border-width: 5px;"> -->
                        </div>
                        <div class="card-body"> 
                            <div class="features">
                                <article>
                                    <div class="content">
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
                                    <div class="content">
                                        <h3>Tan Jun Hong</h3>
                                            <p>
                                                <?php echo $languages[$lang]['lead_programmer'];?>,
                                                <?php echo $languages[$lang]['quality_assurancce'];?>
                                                <br> 6336346 <br>
                                                <?php echo $languages[$lang]['computer_science'];?>
                                                (<?php echo $languages[$lang]['software_engineering'];?>)
                                            </p>
                                        </div>
                                </article>
                                
                                <article>
                                    <div class="content">
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
                                    <div class="content">
                                        <h3>Lee Suet Hui</h3>
                                        <p>
                                            <?php echo $languages[$lang]['ui_ux_develpper'];?>    
                                            <br> 6299027 <br>
                                            <?php echo $languages[$lang]['computer_science'];?>
                                            (<?php echo $languages[$lang]['software_engineering'];?>)
                                        </p>
                                    </div>
                                </article>
                             </div>
                        </div>

                        
                    </div>
                </main>
                <footer class="container-fluid text-center">
                    <p>Copyright 2021 &copy; Cloud Analytics provided by Tech Army</p>
                </footer>
                <!-- <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid ">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright 2021 &copy; Cloud Analytics provided by Tech Army</div>
                        </div>
                    </div>
                </footer> -->
            </div>
        </div>

        
        <!-- Scripts -->
        <script type="text/javascript">
                (function($) {
                    "use strict";
                    // Add active state to sidbar nav links
                    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
                        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
                            if (this.href === path) {
                                $(this).addClass("active");
                            }
                        });

                        // Toggle the side navigation
                        $("#sidebarToggle").on("click", function(e) {
                            e.preventDefault();
                            $("body").toggleClass("sb-sidenav-toggled");
                        });
                })(jQuery);

            </script>
    </body>
</html>
