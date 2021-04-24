<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}

/// [CONNECT THE DASHBOARD CONTROLLER]
require_once('../controller/dashboard_controller.php');
$controllers = new DashboardController();

?>
<DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../lib/styles/dashboard_style.css">
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <title>Help Page</title>
    </head>
    <script>
			$(document).ready(function() {
				<?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $queryResult = $controllers->createCase();
              if ($queryResult == "success") {
                  ?>
                      $("#successModal").modal();
                  <?php 
              } else {
                  ?>
                      $("#failureModal").modal();
                  <?php
              }
          }
				?>
			});
		</script>

    <style>
         .searchBar
        {
          margin-top: 4px;
          margin-right: 16px;
          margin-bottom: 100px;
          margin-left: 10px;
        }

        #myInput 
        {
          background-image: url('/css/searchicon.png');
          background-position: 10px 10px;
          background-repeat: no-repeat;
          float:left;
          width: 40%;
          font-size: 16px;
          padding: 12px 20px 12px 30px;
          border: 3px solid black;
          margin-bottom: 12px;
          background-color: #f1f1f1;
          margin-left:10px;
        }

        input[type=submit] 
        {
          background-color: DodgerBlue;
          color: #fff;
          cursor: pointer;
          margin-left:12px;
          margin-top: 100px;
        }
        
        input 
        {
          border: 1px solid transparent;
          background-color: #f1f1f1;
          padding: 10px;
          font-size: 16px;
          margin-left:12px;
        }

        input[type=text] 
        {
          background-color: #f1f1f1;
          width: 117%;
          margin-left:12px;
          border: 3px solid black;
        }

         input[type=email] 
        {
          background-color: #f1f1f1;
          width: 117%;
          margin-left:12px;
          border: 3px solid black;
        }

         #formInfo
        {
          background-color: #3B9C9C;
                border: 3px solid salmon;
                margin-left:10px;
                padding: 20px;
                border-radius: 25px;
                color:white;
        }

        /*Form*/
        .container-contact{
          background-color: #8bd5ff;
        }
        .contact{
          padding: 4%;
          height: 400px;
        }
        .col-md-3{
          background: #ff9b00;
          padding: 4%;
          border-top-left-radius: 0.5rem;
          border-bottom-left-radius: 0.5rem;
        }
        .contact-info{
          margin-top:10%;
        }
        .contact-info img{
          margin-bottom: 15%;
        }
        .contact-info h2{
          margin-bottom: 10%;
        }
        .col-md-9{
          background: #fff;
          padding: 3%;
          border-top-right-radius: 0.5rem;
          border-bottom-right-radius: 0.5rem;
          background-color: #8bd5ff;
        }
        .contact-form label{
          font-weight:600;
        }
        .contact-form button{
          background: #25274d;
          color: #fff;
          font-weight: 600;
          width: 25%;
        }
        .contact-form button:focus{
          box-shadow:none;
        }
        .form-control
        {
          border-radius: 25px;
          border: 2px solid black;
          padding: 20px; 
          width:120%;
        }

        #btn1, #btn2, #btn3 {
          width: 100%;
          text-align: left;
        }

        main {
          padding-left: 20px;
          padding-right: 20px;
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
                        <h1 class="mt-4">Our team are here to help</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Help</li>
                        </ol>
                    </div>

                    <div class="text-center">
                        <h2>HAVE SOME QUESTION?</h2>
                        <p>We're here to help and answer any question you might have. We look forward to hearing from you</p>
                    </div>

                    <h2>Frequently Asked Questions</h2>
                    <div id="frequentlyAskedQuestionContainer">
                      <div>
                        <h2 class="accordion-header" id="flush-headingOne">
                          <a id="btn1" href="#question1" class="btn btn-warning" data-toggle="collapse">
                            Page loading error codes and issues #1
                          </a>
                        </h2>
                        <div id="question1" class="collapse">
                            <strong>Fix "Aw, Snap!" page crashes and other page loading errors</strong><br> If you're getting the "Aw, Snap" error or another error code instead of a webpage, Chrome is having problems loading. You might also see the page loading slowly or not opening at all.<br>
                            <strong>Reload the page</strong><br>Usually, you can reload the page to fix the error. Press F5 to reload the page.<br>
                            <br><strong>If that didn't work...</strong><br><br>
                            <strong>Step 1: Check your internet connection</strong>
                            <br>Make sure your computer's connected to Wi-Fi or a wired network.<br>
                            Try reloading the tab with the error.<br><br>
                            <strong>Step 2: Clear your cache</strong><br>
                            Chrome might have information stored that's stopping the page from loading.
                        </div>
                      </div>
                      <div>
                        <h2 class="accordion-header" id="flush-headingOne">
                          <a id="btn2" href="#question2" class="btn btn-warning" data-toggle="collapse">
                            Fix connection errors #2
                          </a>
                        </h2>
                        <div id="question2" class="collapse">
                                <strong>If you get an error message when you try to visit a website, try these fixes.</strong> 
                                <br>If your error isn't listed below, learn how to fix page loading errors or downloading errors.
                                <br><br><strong>Fix most connection errors</strong><br>
                                If you try to visit a website and it doesn�t open, first try to fix the error with these troubleshooting steps:<br>
                                1. Check the web address for typos.<br>
                                2. Make sure your internet connection is working normally. If your internet connection is unstable, learn how to fix internet stability issues.<br>
                                3. Contact the website owner.
                        </div>
                      </div>
                      <div>
                        <h2 class="accordion-header" id="flush-headingOne">
                          <a id="btn3" href="#question3" class="btn btn-warning" data-toggle="collapse">
                          How do I logout of this account? #3
                          </a>
                        </h2>
                        <div id="question3" class="collapse">
                        <strong>To log out this account on your device</strong><br>
                           1. Click Log Out at the left side of the menu that appears.<br>
                           2. Click the <strong>Logout Button</strong> on the top right of the page.
                        </div>
                      </div>
                    </div>
                    <br><br>

                    <div class="container-contact">
                      <div class="row">
                        <div class="col-md-3">
                          <div class="contact-info">
                            <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
                            <h2>Contact Us</h2>
                            <h4>We would love to hear from you !</h4>
                          </div>
                        </div>
                        <div class="col-md-9">
                          <form method="post" autocomplete="off">
                          <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>"/>
                          <div class="contact-form">
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="fname">First Name:</label>
                                <div class="col-sm-10">          
                                <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="firstName" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="lname">Last Name:</label>
                                <div class="col-sm-10">          
                                <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lastName" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="comment">Comment:</label>
                                <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
                                </div>
                              </div>
                              <div class="form-group">        
                                <div class="col-sm-offset-2 col-sm-10" style="text-align:center;">
                                <button type="submit" class="btn btn-default">Submit My Case</button>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-2">
                       <a class="nav-link" href="ContactUs.php" target="_blank" style="color:blue;">
                                Contact Us
                       </a>
                    </div>
                </main>
                <footer class="container-fluid text-center">
                    <p>Copyright 2021 &copy; Cloud Analytics provided by Tech Army</p>
                </footer>
            </div>
        </div>
        <div id="successModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Success Message</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<p>Successfully created!</p>
					</div>
					<div class="modal-footer">
                        <a href="dashboard_vm.php" class="btn btn-danger" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>
		<div id="failureModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Error Message</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<p>Failed to create a virtual machine.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>