<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
?>
<DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>Tech Army</title>
    </head>
    <link rel="stylesheet" href="../lib/styles/dashboard_style.css">

    <style>
        
    </style>
    </head>

    <body>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Tech Army</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid text-center">
            <div class="row content">
                <div class="col-sm-2 sidenav">
                    <p>CORE</p>
                    <p><a href="dashboard.php" class="sidenav_menu"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></p><br />
                    <p>APPLIANCES</p>
                    <p><a href="dashboard_cpu.php" class="sidenav_menu">CPU</a></p>
                    <p><a href="dashboard_memory.php" class="sidenav_menu">Memory</a></p>
                    <p><a href="dashboard_disk.php" class="sidenav_menu">HDD/SSD</a></p>
                    <p><a href="dashboard_vm.php" class="sidenav_menu">Virtual Machines</a></p><br />
                    <p>USERS</p>
                    <p><a href="logout.php" class="sidenav_menu">Logout</a></p>
                    <p><a href="#" class="sidenav_menu">Change Profile</a></p><br />
                    <p>TOOLS</p>
                    <p><a href="#" class="sidenav_menu">Settings</a></p>
                    <p><a href="#" class="sidenav_menu">Logs</a></p>
                    <p><a href="#" class="sidenav_menu">Help</a></p><br />

                </div>
                <div class="col-sm-10 text-left">
                    <h1>DISK</h1>
                    <div class="jumbotron">
                        <h4>HDD/SSD Details</h4>
                    </div>
                </div>
            </div>
        </div>

        <footer class="container-fluid text-center">
            <p>Copyright 2021 &copy; Cloud Analytics provided by Tech Army</p>
        </footer>

    </body>

    </html>