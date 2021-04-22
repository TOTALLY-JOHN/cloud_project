<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
/// [CONNECT THE DASHBOARD CONTROLLER]
require_once('../controller/dashboard_controller.php');
$controllers = new DashboardController();
$data = $controllers->getAllVirtualMachines();
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
    </head>
    

    <script type="text/javascript">
        function myFunction() 
        {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("diskTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) 
          {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) 
            {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) 
              {
                tr[i].style.display = "";
              } else 
              {
                tr[i].style.display = "none";
              }
            }       
          }
        }
    </script>

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
                            <a class="nav-link" href="change_profile.php" style="color:white;">
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
                        <h1 class="mt-4">HDD/SSD</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">HDD/SSD</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            A <b>hard disk</b> drive (<b>HDD</b>) is a traditional storage device that uses mechanical platters and a moving read/write head to access data. 
                            A solid state drive (<b>SSD</b>) is a newer, faster type of device that stores data on instantly-accessible memory chips.
                            
                            </div>
                        </div>
                    </div>
                    <div class="searchBar">
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for disk names.." title="Type in a name">
                    </div>
                    <div class="table-responsive">
                        <table id = "diskTable" class = "table">
                            <thead>
                                <tr>
                                    <th>UUID</th>
                                    <th>Device Type</th>
                                    <th>Storage Capacity</th>
                                    <th>Storage Allocation</th>
                                    <th>Storage Available</th>
                                    <th>Storage Format</th>
                                </tr>
                            </thead>
                            <tbody>
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

    <!-- <body>

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
                    <div class="searchBar">
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for disk names.." title="Type in a name">
                    </div>
                    <div class="table-responsive">
                        <table id = "diskTable" class = "table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Disk Image(GB)</th>
                                    <th>Device Type</th>
                                    <th>Cache Mode</th>
                                    <th>Storage Format</th>
                                    <th>Volumes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Local Disk(C:)</td>
                                    <td>256.0</td>
                                    <td>IDE Disk</td>
                                    <td>Partial Cache</td>
                                    <td>ASCII</td>
                                    <td>controller.img</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Local Disk(D:)</td>
                                    <td>1000.0</td>
                                    <td>IDE Disk</td>
                                    <td>Full Cache</td>
                                    <td>Unicode</td>
                                    <td>controller_quantum.img</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Local Disk(E:)</td>
                                    <td>512.0</td>
                                    <td>IDE Disk</td>
                                    <td>No Cache</td>
                                    <td>Binary</td>
                                    <td>controller_ceph.img</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <footer class="container-fluid text-center">
            <p>Copyright 2021 &copy; Cloud Analytics provided by Tech Army</p>
        </footer> -->

    </body>

    </html>