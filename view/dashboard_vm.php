<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
/// [CONNECT THE DASHBOARD CONTROLLER]
require_once('../controller/dashboard_controller.php');
$controllers = new DashboardController();
$data = $controllers->getAllVirtualMachines();
echo $_SESSION['userRole'];
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
        <script type="text/javascript">
             // Load google charts
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            // Draw the chart and set the chart values
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Virtual Machines', 'Average Hours per Day'],
                ['VM-1', 8],
                ['VM-2', 2],
                ['VM-3', 4],
                ['VM-4', 2],
                ['VM-5', 8]
                ]);
                // Optional; add a title and set the width and height of the chart
                var options = {'title':'VM Usage per Day', 'width':550, 'height':400};
                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
                }
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

        #createVMBtn {
            height: 40px;
        }

        #searchVM {
            height: 40px; 
            margin-top: 3px; 
            border: 2px solid black; 
            border-radius: 5px; 
            padding: 5px;
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
                            <a class="nav-link" style="color:white; ">
                                <div class="sb-nav-link-icon" style="color:white;" ><i class="fas fa-user"></i></div>
                                &nbsp; Hi, <?php echo $_SESSION['username'];?>
                            </a>
                            <?php
                                if ($_SESSION['userRole'] == "admin") {
                            ?>
                                <a href="manage_users.php" class="nav-link" style="color:white;">
                                    <div class="sb-nav-link-icon" style="color:white;" >
                                        Manage Users
                                    </div>
                                </a>
                            <?php
                                }
                            ?>
                                
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
                    <h1 class="mt-4">Virtual Machines</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Virtual Machines</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            Virtual Machines Details
                            </div>
                        </div>
                        <div class="card mb-4" id="tableContainer">
                        <div style="margin: 15px;">
                            <a id="createVMBtn" href="create_vm.php" class="btn btn-primary">Create New VM +</a> &nbsp;
                            <input type="text" name="searchVM" id="searchVM" placeholder="Search VM..."/>
                        </div>
                        <table id="vmTable" class="table table-bordered" style="width: 1800px;">
                            <thead>
                                <th class="vm_table_header">UUID</th>
                                <th class="vm_table_header">Domain Name</th>
                                <th class="vm_table_header">Storage Allocation</th>
                                <th class="vm_table_header">Memory Allocation</th>
                                <th class="vm_table_header">CPU Allocation</th>
                                <th class="vm_table_header">Device Type</th>
                                <th class="vm_table_header">Source Path</th>
                                <th class="vm_table_header">Storage Format</th>
                                <th class="vm_table_header">Actions</th>
                            </thead>
                            <tbody>
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
                                            <a href="usage_vm.php?uuid=<?php echo $row['uuid'];?>" class="btn btn-primary">Usage</a>
                                            <a href="update_vm.php?uuid=<?php echo $row['uuid'];?>" class="btn btn-success">Edit</a>
                                            <a href="delete_vm.php?uuid=<?php echo $row['uuid'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
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
        <script type="text/javascript">
        function myFunction() 
        {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("searchVM");
          filter = input.value.toUpperCase();
          table = document.getElementById("vmTable");
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
    </body>

    </html>