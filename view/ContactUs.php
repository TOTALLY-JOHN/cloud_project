<?php
session_start();
// if (!isset($_SESSION['username'])) {
//     header('location: login.php');
// }
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
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <title>Contact Us</title>
    </head>
    

    <script type="text/javascript">
        
    </script>
  

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

        #left
		{
			/*background-color: azure;*/
			float: left;
		}

        .svg-icon 
        {
          width: 30px;
          height: 30px;
        }

        .svg-icon path,
        .svg-icon polygon,
        .svg-icon rect 
        {
          fill: #4691f6;
        }

        .svg-icon circle 
        {
          stroke: #4691f6;
          stroke-width: 1;
        }
       
        #containerLoc 
        {
            position: relative;
            float:left;
            text-align: center;
        }
        #containerContact 
        {
            position: relative;
            text-align: center;
        }
        #containerEmail
        {
            position: relative;
            float:right;
            text-align: center;
        }
        
         #circle 
        {
            background: #A6F9D0;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            margin-left: auto;
            margin-right: auto;
        }

        #containerLogo
        {
          display: grid;
          grid-template-columns: auto auto auto;
          grid-template-rows: 80px 160px;
          grid-gap: 10px;
          background-color: #004953;
          padding: 10px;
          color:white;

        }

        /* */
        body{margin-top:20px;
        background:#eee;
        }

        /* CONTACTS */
        .contact-box {
        background-color: #ffffff;
        border: 1px solid #e7eaec;
        padding: 20px;
        margin-bottom: 20px;

        }
        .contact-box > a {
        color: inherit;
        }
        .contact-box.center-version {
        border: 1px solid #e7eaec;
        padding: 0;
        }
        .contact-box.center-version > a {
        display: block;
        background-color: #ffffff;
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
        background-color: #ffffff;
        border-top: 1px solid #e7eaec;
        padding: 15px 20px;
        }
        a{
            text-decoration:none !important;    
        }
        .container
        {
            background-color: #be7eff;
            padding: 20px;
            border-radius: 3px;
            margin-bottom: 30px;
            border-radius: 40px;
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
                                <a href="manage_cases.php" class="nav-link" style="color:white;">
                                    <div class="sb-nav-link-icon" style="color:white;" >
                                        Manage Cases
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
                            <?php
                                if ($_SESSION['userRole'] != "admin") {
                            ?>
                            <div class="sb-sidenav-menu-heading">Users</div>
                            <a class="nav-link" href="change_profile.php" style="color:white;">
                                Change Profile
                            </a>
                            <a class="nav-link" href="help.php" style="color:white;">
                                Help
                            </a>
                            <a class="nav-link" href="cases.php" style="color:white;">
                                My Cases
                            </a>
                            <?php
                                }
                            ?>
                            <hr />
                            <a class="nav-link" href="about.php" style="color:white;">
                                About Us
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Contact Us</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contact Us</li>
                        </ol>
                    </div>

                    <div class="text-center">
                        <h2>Get In touch with us</h2>
                        <p>For any problem feel free to contact us</p>
                    </div>
                    <!----------------------------------------------->
                    <div class="container" >
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="contact-box center-version">
                                    <a href="#profile.html">
                                        <img alt="image" class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                                        <h3 class="m-b-xs"><strong>John Smith</strong></h3>
                            
                                        <div class="font-bold">Graphics designer</div>
                                        <address class="m-t-md">
                                            <strong>TechArmy, Inc.</strong><br>
                                            <svg class="svg-icon" viewBox="0 0 20 20">
                                                <path d="M10,1.375c-3.17,0-5.75,2.548-5.75,5.682c0,6.685,5.259,11.276,5.483,11.469c0.152,0.132,0.382,0.132,0.534,0c0.224-0.193,5.481-4.784,5.483-11.469C15.75,3.923,13.171,1.375,10,1.375 M10,17.653c-1.064-1.024-4.929-5.127-4.929-10.596c0-2.68,2.212-4.861,4.929-4.861s4.929,2.181,4.929,4.861C14.927,12.518,11.063,16.627,10,17.653 M10,3.839c-1.815,0-3.286,1.47-3.286,3.286s1.47,3.286,3.286,3.286s3.286-1.47,3.286-3.286S11.815,3.839,10,3.839 M10,9.589c-1.359,0-2.464-1.105-2.464-2.464S8.641,4.661,10,4.661s2.464,1.105,2.464,2.464S11.359,9.589,10,9.589"></path>
                                            </svg>
                                            3, Jalan SS 15/8, Ss 15, 47500 Subang Jaya, Selangor<br>
                                            <svg class="svg-icon" viewBox="0 0 20 20">
                                                <path d="M14.911,1.295H5.09c-0.737,0-1.339,0.603-1.339,1.339v14.733c0,0.736,0.603,1.338,1.339,1.338h9.821c0.737,0,1.339-0.602,1.339-1.338V2.634C16.25,1.898,15.648,1.295,14.911,1.295 M15.357,17.367c0,0.24-0.205,0.445-0.446,0.445H5.09c-0.241,0-0.446-0.205-0.446-0.445v-0.893h10.714V17.367z M15.357,15.58H4.644V4.42h10.714V15.58z M15.357,3.527H4.644V2.634c0-0.241,0.205-0.446,0.446-0.446h9.821c0.241,0,0.446,0.206,0.446,0.446V3.527z"></path>
                                            </svg>
                                            012-3456789 ( Phone )<br>
                                            <svg class="svg-icon" viewBox="0 0 20 20">
                                                <path fill="none" d="M16.999,4.975L16.999,4.975C16.999,4.975,16.999,4.975,16.999,4.975c-0.419-0.4-0.979-0.654-1.604-0.654H4.606c-0.584,0-1.104,0.236-1.514,0.593C3.076,4.928,3.05,4.925,3.037,4.943C3.034,4.945,3.035,4.95,3.032,4.953C2.574,5.379,2.276,5.975,2.276,6.649v6.702c0,1.285,1.045,2.329,2.33,2.329h10.79c1.285,0,2.328-1.044,2.328-2.329V6.649C17.724,5.989,17.441,5.399,16.999,4.975z M15.396,5.356c0.098,0,0.183,0.035,0.273,0.055l-5.668,4.735L4.382,5.401c0.075-0.014,0.145-0.045,0.224-0.045H15.396z M16.688,13.351c0,0.712-0.581,1.294-1.293,1.294H4.606c-0.714,0-1.294-0.582-1.294-1.294V6.649c0-0.235,0.081-0.445,0.192-0.636l6.162,5.205c0.096,0.081,0.215,0.122,0.334,0.122c0.118,0,0.235-0.041,0.333-0.12l6.189-5.171c0.099,0.181,0.168,0.38,0.168,0.6V13.351z"></path>
                                            </svg>
                                            TechArmy@gmail.com
                                        </address>
                            
                                    </a>
                                    <div class="contact-box-footer">
                                        <div class="m-t-xs btn-group">
                                            <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                                            <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                                        </div>
                                    </div>
                            
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="contact-box center-version">
                                    <a href="#profile.html">
                                        <img alt="image" class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar6.png">
                                        <h3 class="m-b-xs"><strong>Jonny Depp</strong></h3>
                            
                                        <div class="font-bold">Lead Programmer</div>
                                        <address class="m-t-md">
                                            <strong>TechArmy, Inc.</strong><br>
                                            <svg class="svg-icon" viewBox="0 0 20 20">
                                                <path d="M10,1.375c-3.17,0-5.75,2.548-5.75,5.682c0,6.685,5.259,11.276,5.483,11.469c0.152,0.132,0.382,0.132,0.534,0c0.224-0.193,5.481-4.784,5.483-11.469C15.75,3.923,13.171,1.375,10,1.375 M10,17.653c-1.064-1.024-4.929-5.127-4.929-10.596c0-2.68,2.212-4.861,4.929-4.861s4.929,2.181,4.929,4.861C14.927,12.518,11.063,16.627,10,17.653 M10,3.839c-1.815,0-3.286,1.47-3.286,3.286s1.47,3.286,3.286,3.286s3.286-1.47,3.286-3.286S11.815,3.839,10,3.839 M10,9.589c-1.359,0-2.464-1.105-2.464-2.464S8.641,4.661,10,4.661s2.464,1.105,2.464,2.464S11.359,9.589,10,9.589"></path>
                                            </svg>
                                            3, Jalan SS 15/8, Ss 15, 47500 Subang Jaya, Selangor<br>
                                            <svg class="svg-icon" viewBox="0 0 20 20">
                                                <path d="M14.911,1.295H5.09c-0.737,0-1.339,0.603-1.339,1.339v14.733c0,0.736,0.603,1.338,1.339,1.338h9.821c0.737,0,1.339-0.602,1.339-1.338V2.634C16.25,1.898,15.648,1.295,14.911,1.295 M15.357,17.367c0,0.24-0.205,0.445-0.446,0.445H5.09c-0.241,0-0.446-0.205-0.446-0.445v-0.893h10.714V17.367z M15.357,15.58H4.644V4.42h10.714V15.58z M15.357,3.527H4.644V2.634c0-0.241,0.205-0.446,0.446-0.446h9.821c0.241,0,0.446,0.206,0.446,0.446V3.527z"></path>
                                            </svg>
                                            012-3456789 ( Phone )<br>
                                            <svg class="svg-icon" viewBox="0 0 20 20">
                                                <path fill="none" d="M16.999,4.975L16.999,4.975C16.999,4.975,16.999,4.975,16.999,4.975c-0.419-0.4-0.979-0.654-1.604-0.654H4.606c-0.584,0-1.104,0.236-1.514,0.593C3.076,4.928,3.05,4.925,3.037,4.943C3.034,4.945,3.035,4.95,3.032,4.953C2.574,5.379,2.276,5.975,2.276,6.649v6.702c0,1.285,1.045,2.329,2.33,2.329h10.79c1.285,0,2.328-1.044,2.328-2.329V6.649C17.724,5.989,17.441,5.399,16.999,4.975z M15.396,5.356c0.098,0,0.183,0.035,0.273,0.055l-5.668,4.735L4.382,5.401c0.075-0.014,0.145-0.045,0.224-0.045H15.396z M16.688,13.351c0,0.712-0.581,1.294-1.293,1.294H4.606c-0.714,0-1.294-0.582-1.294-1.294V6.649c0-0.235,0.081-0.445,0.192-0.636l6.162,5.205c0.096,0.081,0.215,0.122,0.334,0.122c0.118,0,0.235-0.041,0.333-0.12l6.189-5.171c0.099,0.181,0.168,0.38,0.168,0.6V13.351z"></path>
                                            </svg>
                                            TechArmy@gmail.com
                                        </address>
                            
                                    </a>
                                    <div class="contact-box-footer">
                                        <div class="m-t-xs btn-group">
                                            <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                                            <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                                        </div>
                                    </div>
                            
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="contact-box center-version">
                                    <a href="#profile.html">
                                        <img alt="image" class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png">
                                        <h3 class="m-b-xs"><strong>Emma Watson</strong></h3>
                            
                                        <div class="font-bold">Database Administrator</div>
                                        <address class="m-t-md">
                                            <strong>TechArmy, Inc.</strong><br>
                                            <svg class="svg-icon" viewBox="0 0 20 20">
                                                <path d="M10,1.375c-3.17,0-5.75,2.548-5.75,5.682c0,6.685,5.259,11.276,5.483,11.469c0.152,0.132,0.382,0.132,0.534,0c0.224-0.193,5.481-4.784,5.483-11.469C15.75,3.923,13.171,1.375,10,1.375 M10,17.653c-1.064-1.024-4.929-5.127-4.929-10.596c0-2.68,2.212-4.861,4.929-4.861s4.929,2.181,4.929,4.861C14.927,12.518,11.063,16.627,10,17.653 M10,3.839c-1.815,0-3.286,1.47-3.286,3.286s1.47,3.286,3.286,3.286s3.286-1.47,3.286-3.286S11.815,3.839,10,3.839 M10,9.589c-1.359,0-2.464-1.105-2.464-2.464S8.641,4.661,10,4.661s2.464,1.105,2.464,2.464S11.359,9.589,10,9.589"></path>
                                            </svg>
                                            3, Jalan SS 15/8, Ss 15, 47500 Subang Jaya, Selangor<br>
                                            <svg class="svg-icon" viewBox="0 0 20 20">
                                                <path d="M14.911,1.295H5.09c-0.737,0-1.339,0.603-1.339,1.339v14.733c0,0.736,0.603,1.338,1.339,1.338h9.821c0.737,0,1.339-0.602,1.339-1.338V2.634C16.25,1.898,15.648,1.295,14.911,1.295 M15.357,17.367c0,0.24-0.205,0.445-0.446,0.445H5.09c-0.241,0-0.446-0.205-0.446-0.445v-0.893h10.714V17.367z M15.357,15.58H4.644V4.42h10.714V15.58z M15.357,3.527H4.644V2.634c0-0.241,0.205-0.446,0.446-0.446h9.821c0.241,0,0.446,0.206,0.446,0.446V3.527z"></path>
                                            </svg>
                                            012-3456789 ( Phone )<br>
                                            <svg class="svg-icon" viewBox="0 0 20 20">
                                                <path fill="none" d="M16.999,4.975L16.999,4.975C16.999,4.975,16.999,4.975,16.999,4.975c-0.419-0.4-0.979-0.654-1.604-0.654H4.606c-0.584,0-1.104,0.236-1.514,0.593C3.076,4.928,3.05,4.925,3.037,4.943C3.034,4.945,3.035,4.95,3.032,4.953C2.574,5.379,2.276,5.975,2.276,6.649v6.702c0,1.285,1.045,2.329,2.33,2.329h10.79c1.285,0,2.328-1.044,2.328-2.329V6.649C17.724,5.989,17.441,5.399,16.999,4.975z M15.396,5.356c0.098,0,0.183,0.035,0.273,0.055l-5.668,4.735L4.382,5.401c0.075-0.014,0.145-0.045,0.224-0.045H15.396z M16.688,13.351c0,0.712-0.581,1.294-1.293,1.294H4.606c-0.714,0-1.294-0.582-1.294-1.294V6.649c0-0.235,0.081-0.445,0.192-0.636l6.162,5.205c0.096,0.081,0.215,0.122,0.334,0.122c0.118,0,0.235-0.041,0.333-0.12l6.189-5.171c0.099,0.181,0.168,0.38,0.168,0.6V13.351z"></path>
                                            </svg>
                                            TechArmy@gmail.com
                                        </address>
                            
                                    </a>
                                    <div class="contact-box-footer">
                                        <div class="m-t-xs btn-group">
                                            <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                                            <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                                        </div>
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--------------------
                    <div id="containerLogo" class="container-fluid">
                        <div id="containerLoc">
                            <div id="circle">
                                <svg class="svg-icon" viewBox="0 0 20 20">
							        <path d="M10,1.375c-3.17,0-5.75,2.548-5.75,5.682c0,6.685,5.259,11.276,5.483,11.469c0.152,0.132,0.382,0.132,0.534,0c0.224-0.193,5.481-4.784,5.483-11.469C15.75,3.923,13.171,1.375,10,1.375 M10,17.653c-1.064-1.024-4.929-5.127-4.929-10.596c0-2.68,2.212-4.861,4.929-4.861s4.929,2.181,4.929,4.861C14.927,12.518,11.063,16.627,10,17.653 M10,3.839c-1.815,0-3.286,1.47-3.286,3.286s1.47,3.286,3.286,3.286s3.286-1.47,3.286-3.286S11.815,3.839,10,3.839 M10,9.589c-1.359,0-2.464-1.105-2.464-2.464S8.641,4.661,10,4.661s2.464,1.105,2.464,2.464S11.359,9.589,10,9.589"></path>
						        </svg>
                            </div>
                            <b>Tech Army Office</b>
                            <p>3, Jalan SS 15/8, Ss 15, 47500 Subang Jaya, Selangor</p>
                        </div>

                        <div id="containerContact">
                            <div id="circle">
                                <svg class="svg-icon" viewBox="0 0 20 20">
							        <path d="M13.372,1.781H6.628c-0.696,0-1.265,0.569-1.265,1.265v13.91c0,0.695,0.569,1.265,1.265,1.265h6.744c0.695,0,1.265-0.569,1.265-1.265V3.045C14.637,2.35,14.067,1.781,13.372,1.781 M13.794,16.955c0,0.228-0.194,0.421-0.422,0.421H6.628c-0.228,0-0.421-0.193-0.421-0.421v-0.843h7.587V16.955z M13.794,15.269H6.207V4.731h7.587V15.269z M13.794,3.888H6.207V3.045c0-0.228,0.194-0.421,0.421-0.421h6.744c0.228,0,0.422,0.194,0.422,0.421V3.888z"></path>
						        </svg>
                            </div>
                            <b>Tech Army Office</b>
                            <p>07-1234567 (Phone)</p>
                            <b>Mr.Tan Jun Hong</b>
                            <p>012-3456789 (Phone)</p>
                        </div>

                        <div id="containerEmail">
                            <div id="circle">
                                <svg class="svg-icon" viewBox="0 0 20 20">
							        <path d="M17.388,4.751H2.613c-0.213,0-0.389,0.175-0.389,0.389v9.72c0,0.216,0.175,0.389,0.389,0.389h14.775c0.214,0,0.389-0.173,0.389-0.389v-9.72C17.776,4.926,17.602,4.751,17.388,4.751 M16.448,5.53L10,11.984L3.552,5.53H16.448zM3.002,6.081l3.921,3.925l-3.921,3.925V6.081z M3.56,14.471l3.914-3.916l2.253,2.253c0.153,0.153,0.395,0.153,0.548,0l2.253-2.253l3.913,3.916H3.56z M16.999,13.931l-3.921-3.925l3.921-3.925V13.931z"></path>
						        </svg> 
                            </div>
                            <b>Request for help</b>
                            <p>techarmy@gmail.com (IT Support)</p>
                        </div>
                   </div>
                   --------------------------->

                    <!--
                    <div class="row">
                        <div class= col-md-6 id="left">
                            <h3>Contact number</h3>
                                <i style="font-size:35px" class="fa">&#xf095;</i>
                                <LI style="list-style-type: circle; font-size: 2em">07-1234567 (John)</LI>
                                <LI style="list-style-type: circle; font-size: 2em">012-3456789 (Mr.Tan)</LI>
                                <br><br>
                            <h3>Email:</h3>
                                <i style="font-size:35px" class="fa">&#xf0e0;</i>
                                <LI style="list-style-type: circle; font-size: 2em">techarmy@gmail.com (IT Support)</LI>

                        </div>
                    </div>
                    -->
                        <div class= col-md-12 id="left">
                            <h3>Location</h3>  
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.0757713853427!2d101.58901761470446!3d3.0744364977611744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4c5f8bdfaba7%3A0x31aac7ab1af0abc!2sINTI%20International%20College%20Subang!5e0!3m2!1sen!2smy!4v1617431323703!5m2!1sen!2smy" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>"
                        </div>
                     







                </main>
                <footer class="container-fluid text-center">
                    <p>Copyright 2021 &copy; Cloud Analytics provided by Tech Army</p>
                </footer>
            </div>
        </div>

    </body>


    </body>

    </html>