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
        <link rel="stylesheet" href="../lib/styles/dashboard_style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script type='text/javascript'src='http://code.jquery.com/jquery-1.8.3.js'></script>
		<script type='text/javascript'src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css"href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css">
        <title>Tech Army</title>
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
                	<div class="dropdown btn-group">
	                    <a class="btn dropdown-toggle" data-toggle="dropdown">
	                    	Language 
	                    </a>
	                    <ul id="language" class="dropdown-menu">
		                        	<li><a onclick="langSwitch(1)">English</a></li>
		                        	<li><a onclick="langSwitch(2)">Chinese</a></li>
		                        	<li><a onclick="langSwitch(3)">Malay</a></li>
		                        	<li><a onclick="langSwitch(4)">Korean</a></li>
	                    </ul>
	                </div>
                </li>
            </ul>
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
                        <h1 class="mt-4" id="firstline">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            Admin Dashboard
                            
                            </div>
                        </div>
                        <div class="card mb-4">
                        <table>
                            <tbody>
                                <tr>
                                    <td><a href="dashboard_cpu.php" class="btn btn-primary">
                                <div class="dashboard-btn">
                                    <h4>CPU</h4>
                                    <hr />
                                    <h5>View Details <span class="glyphicon glyphicon-chevron-right"></span></h5>
                                </div>
                            </a></td>
                                    <td><a href="dashboard_memory.php" class="btn btn-warning">
                                <div class="dashboard-btn">
                                    <h4>MEMORY</h4>
                                    <hr />
                                    <h5>View Details <span class="glyphicon glyphicon-chevron-right"></span></h5>
                                </div>
                            </a></td>
                                    <td><a href="dashboard_disk.php" class="btn btn-success">
                                <div class="dashboard-btn">
                                    <h4>HDD/SSD</h4>
                                    <hr />
                                    <h5>View Details <span class="glyphicon glyphicon-chevron-right"></span></h5>
                                </div>
                            </a></td>
                                    <td><a href="dashboard_vm.php" class="btn btn-danger">
                                <div class="dashboard-btn">
                                    <h4>Virtual Machines</h4>
                                    <hr />
                                    <h5>View Details <span class="glyphicon glyphicon-chevron-right"></span></h5>
                                </div>
                            </a></td>
                                </tr>
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
        <script>
        		var str = location.href.match(/(^[^#]*)/)[0];
			    var language = {
			    	en: {
			    		dashboard: "Dashboard"
			    	},
			    	cn: {
			    		dashboard: "仪表盘"
			    	},
			    	my: {
			    		dashboard: "Papan Pemuka"
			    	},
			    	kr: {
			    		dashboard: "계기반"
			    	}
			    };

			    if (window.location.hash){
			    	if(window.location.hash === "#en"){
				    	firstline.textContent = language.en.dashboard;
				    }
				   	if(window.location.hash === "#cn"){
				    	firstline.textContent = language.cn.dashboard;
				    }
				    if(window.location.hash === "#my"){
				    	firstline.textContent = language.my.dashboard;
				    }
				    if(window.location.hash === "#kr"){
				    	firstline.textContent = language.kr.dashboard;
				    }
				}

				function langSwitch(x){
					if (x == 1){
						location.replace(str + "#en");
					}
					else if (x == 2){
						location.replace(str + "#cn");
					}
					else if (x == 3){
						location.replace(str + "#my");
					}
					else if (x == 4){
						location.replace(str + "#kr");
					}
					location.reload(true);
				}

		</script>
        </body>

    </html>