<?php
session_start();
// if (!isset($_SESSION['username'])) {
//     header('location: login.php');
// }
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
                            <div class="sb-sidenav-menu-heading">Users</div>
                            <a class="nav-link" href="logout.php" style="color:white;">
                                Logout
                            </a>
                            <a class="nav-link" href="#" style="color:white;">
                                Change Profile
                            </a>
                            <div class="sb-sidenav-menu-heading">Tools</div>
                            <a class="nav-link" href="#" style="color:white;">
                                Settings
                            </a>
                            <a class="nav-link" href="#" style="color:white;">
                                Logs
                            </a>
                            <a class="nav-link" href="#" style="color:white;">
                                Help
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Memory</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Memory</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            The <b>Memory Usage </b> window displays the amount of memory available on your system, as well as the memory currently in use by 
                            all applications, including Windows itself. The memory available on your system is the sum of all physical memory installed 
                            on your system and the pagefile on your hard disk, which is used to complement the physical memory.
                            
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-line mr-1"></i>
                                Memory Usage
                            </div>
                            <div class="card-body"><div id="chart_div" style= "width: 100%; min-height: 450px;"></div></div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>

                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Memory Utilization Report
                            </div>
                            <div class="card-body">
                                <div id="piechart_3d" style= "width: 100%; min-height: 450px; "></div>
                            </div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
        <!-- Realtime Area-Chart -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            // load current chart package
            google.charts.load("current", {
                packages: ["corechart"]
            });
            // set callback function when api loaded
            google.charts.setOnLoadCallback(drawChart1);

            function drawChart1() {
                let data = google.visualization.arrayToDataTable([
                    ["Year", "Memory Usage"],
                    [0, 0]
                ]);

                // create options object with titles, colors, etc.
                let options = {
                    title: "Memory Usage",
                    hAxis: {
                    title: "Time"
                    },
                    vAxis: {
                    title: "Usage"
                    }
                };
                // draw chart on load
                let chart = new google.visualization.AreaChart(
                    document.getElementById("chart_div")
                );
                chart.draw(data, options);

                // update data dynamically
                // interval for adding new data every 250ms
                let index = 0;
                setInterval(function() {
                    // instead of this random, you can make an ajax call for the current cpu usage or what ever data you want to display
                    let random = Math.random() * 30 + 20;
                    data.addRow([index, random]);
                    chart.draw(data, options);
                    index++;
                }, 1500);
            }


        // <!-- Pie Chart --> 
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart2);
            function drawChart2() {
                var data = google.visualization.arrayToDataTable([
                ['Process', 'Amount of Memory'],
                ['Chrome', 11],
                ['SearchUI', 2],
                ['Memory Compression', 2],
                ['dvm', 2],
                ['Other', 7]
                ]);

                var options = {
                    title: 'Memory Usage Per Process',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
            

                $(window).resize(function(){
                    drawChart1();
                    drawChart2();
                });

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
