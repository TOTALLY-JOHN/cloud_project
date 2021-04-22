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
            border: 3px solid black;
		}

        .svg-icon 
        {
          width: 80px;
          height: 80px;
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