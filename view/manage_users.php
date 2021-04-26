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
        <link rel="stylesheet" href="../lib/styles/dashboard_style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">

        <title>Manage Users</title>
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
    </head>

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
                        <div class="card mb-4" id="tableContainer">
                        <table id="vmTable" class="table table-bordered">
                            <thead>
                                <th class="vm_table_header"><?php echo $languages[$lang]['username'];?></th>
                                <th class="vm_table_header"><?php echo $languages[$lang]['user_email'];?></th>
                                <th class="vm_table_header"><?php echo $languages[$lang]['user_role'];?></th>
                                <th class="vm_table_header"><?php echo $languages[$lang]['request_change_password'];?></th>
                                <th class="vm_table_header"><?php echo $languages[$lang]['actions'];?></th>
                            </thead>
                            <tbody>
                                <?php
                                    while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['userEmail']; ?></td>
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