<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}

/// [CONNECT THE DASHBOARD CONTROLLER]
require_once('../controller/dashboard_controller.php');
include('../lib/common/languages.php');
$controllers = new DashboardController();
//! LANGUAGE SETTINGS
$lang = $_SESSION['userLanguage'] ?? "en";
?>
<DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" href="../lib/styles/dashboard_style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
        <!-- Nucleo Icons -->
        <link href="../lib/assets/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link href="../lib/assets/css/black-dashboard.css" rel="stylesheet" />
        <title>Tech Army</title>
    </head>
    <script>
			$(document).ready(function() {
				
			});
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
          float:left;
          width: 40%;
          font-size: 16px;
          padding: 12px 20px 12px 30px;
          border: 2px solid black;
          margin-bottom: 12px;
          background-color: #f1f1f1;
        }

        input[type=submit] 
        {
          /* background-color: DodgerBlue; */
          background-color: #e16747;
          color: #fff;
          cursor: pointer;
          margin-top: 100px;
        }
        
        input 
        {
          border: 1px solid transparent;
          background-color: #f1f1f1;
          padding: 10px;
          font-size: 16px;
        }

        input[type=text] 
        {
          background-color: #f1f1f1;
          width: 100%;
          border: 2px solid black;
        }

         input[type=email] 
        {
          background-color: #f1f1f1;
          width: 100%;
          border: 2px solid black;
        }

         #formInfo
        {
          background-color: #3B9C9C;
                border: 2px solid salmon;
                margin-left:10px;
                padding: 20px;
                border-radius: 25px;
                color:white;
        }

        /*Form*/
        .container-contact{
          /* background-color: #8bd5ff; */
          padding-left: 10px;
          padding-right: 10px;
        }

        .contact{
          padding: 4%;
          height: 400px;
        }

        .col-md-3{
          /* background: #ff9b00; */
          background-color: #E16747;
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
          /* background: #fff; */
          padding: 3%;
          border-top-right-radius: 0.5rem;
          border-bottom-right-radius: 0.5rem;
          /* background-color: #8bd5ff; */
          /* background-color: #494949; */
        }

        .contact-form label{
          font-weight:600;
        }

        .contact-form button{
          background: #e16747;
          color: #fff;
          font-weight: 600;
          width: 25%;
        }

        .contact-form button{
          background-color: #F35931;
        }

        .contact-form button:focus{
          box-shadow:none;
        }
        .form-control
        {
          border-radius: 25px;
          border: 2px solid black;
          padding: 20px; 
          width:100%;
        }

        #btn1, #btn2, #btn3 {
          width: 100%;
          text-align: left;
        }

        main {
          padding-left: 20px;
          padding-right: 20px;
        }

        .nav li p {
            font-size: 15px;
        }
    </style>
    </head>
    <body class="">
        <div class="wrapper">
            <div class="sidebar">
                <div class="sidebar-wrapper">
                    <div class="logo">
                    <a href="dashboard.php" class="simple-text logo-mini">
                        <strong>T</strong> <strong>A</strong>
                    </a>
                    <a href="dashboard.php" class="simple-text logo-normal">
                        TechArmy
                    </a>
                    </div>
                    <ul class="nav">
                    <?php
                        if ($_SESSION['userRole'] == "admin") {
                    ?>
                        <li>
                            <a href="./manage_users.php">
                            <i class="fas fa-users-cog"></i>
                            <p> <?php echo $languages[$lang]['manage_users'];?> </p>
                            </a>
                        </li>
                        <li>
                            <a href="./manage_cases.php">
                            <i class="fas fa-cogs"></i>
                            <p> <?php echo $languages[$lang]['manage_cases'];?> </p>
                            </a>
                        </li>
                    <?php
                        }
                    ?>
                    <li>
                        <a href="./dashboard.php">
                        <i class="fas fa-tachometer-alt"></i>
                        <p><?php echo $languages[$lang]['dashboard'];?></p>
                        </a>
                    </li>
                    <li>
                        <a href="./dashboard_cpu.php">
                        <i class="fa fa-microchip" aria-hidden="true"></i>
                        <p>CPU</p>
                        </a>
                    </li>
                    <li>
                        <a href="./dashboard_memory.php">
                        <i class="fas fa-database"></i>
                        <p><?php echo $languages[$lang]['memory'];?></p>
                        </a>
                    </li>
                    <li>
                        <a href="./dashboard_disk.php">
                        <i class="fas fa-hdd"></i>
                        <p>HDD / SSD</p>
                        </a>
                    </li>
                    <li>
                        <a href="./dashboard_vm.php">
                        <i class="fas fa-server"></i>
                        <p> <?php echo $languages[$lang]['virtual_machines'];?> </p>
                        </a>
                    </li>
                    <?php
                        if ($_SESSION['userRole'] != "admin") {
                    ?>
                        <li>
                            <a href="./change_profile.php">
                            <i class="tim-icons icon-single-02"></i>
                            <p> <?php echo $languages[$lang]['change_profile'];?> </p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="./help.php">
                            <i class="fas fa-question-circle"></i>
                            <p> <?php echo $languages[$lang]['help'];?> </p>
                            </a>
                        </li>
                        <li>
                            <a href="./cases.php">
                            <i class="tim-icons icon-settings"></i>
                            <p> <?php echo $languages[$lang]['my_cases'];?> </p>
                            </a>
                        </li>
                    <?php
                        }
                    ?>
                    <li>
                        <a href="./about.php">
                        <i class="tim-icons icon-puzzle-10"></i>
                        <p> <?php echo $languages[$lang]['about_us'];?> </p>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle d-inline">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                        </div>
                        <a class="navbar-brand" href="dashboard.php">Cloud Analytics</a> <!-- :void(0) to prevent the page from refreshing -->
                        </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto">
                        <li>
                            <input type="checkbox" class="checkbox" id="checkbox">
                            <label for="checkbox" class="label_theme">
                                <i class="fas fa-sun"></i>
                                <i class="fas fa-moon"></i>
                                <div class="ball"></div>
                            </label>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <div class="photo">
                                <img src="../lib/assets/img/anime3.png" alt="Profile Photo">
                            </div>
                            <b class="caret d-none d-lg-block d-xl-block"></b>
                            <p class="d-lg-none">
                                User
                            </p>
                            </a>
                            <ul class="dropdown-menu dropdown-navbar">
                                <li class="nav-link">
                                    <p class="nav-item dropdown-item "> 
                                        <?php echo $languages[$lang]['hi'];?>, 
                                        <?php echo $_SESSION['username'];?> 
                                        <?php 
                                        if ($_SESSION['userLanguage'] == "kr") {
                                            echo "님";
                                        } 
                                        ?>
                                    </p>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li class="nav-link">
                                    <a href="./logout.php" class="nav-item dropdown-item"><?php echo $languages[$lang]['logout'];?> &nbsp;<i class="fas fa-sign-out-alt"></i></a>
                                </li>
                            </ul>
                        </li>
                        <li class="separator d-lg-none"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <main>
                    <div class="container-fluid">
                      <h1 class="mt-4"><?php echo $languages[$lang]['help_header'];?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Help</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <h2><?php echo $languages[$lang]['frequently_asked_questions'];?></h2>
                              <div id="frequentlyAskedQuestionContainer">
                                <div>
                                  <h2 class="accordion-header" id="flush-headingOne">
                                    <a id="btn1" href="#question1" class="btn btn-success" data-toggle="collapse">
                                      <?php echo $languages[$lang]['faq_q1'];?> #1
                                    </a>
                                  </h2>
                                  <div id="question1" class="collapse">
                                      <strong><?php echo $languages[$lang]['faq_q1_a1'];?></strong>
                                      <br><?php echo $languages[$lang]['faq_q1_a2'];?>
                                      <br>
                                      <strong><?php echo $languages[$lang]['faq_q1_a3'];?></strong><br>
                                      <?php echo $languages[$lang]['faq_q1_a4'];?><br>
                                      <br><strong><?php echo $languages[$lang]['faq_q1_a5'];?></strong><br><br>
                                      <strong><?php echo $languages[$lang]['faq_q1_a6'];?></strong>
                                      <br><?php echo $languages[$lang]['faq_q1_a7'];?><br>
                                      <?php echo $languages[$lang]['faq_q1_a8'];?><br><br>
                                      <strong><?php echo $languages[$lang]['faq_q1_a9'];?></strong><br>
                                      <?php echo $languages[$lang]['faq_q1_a10'];?>
                                  </div>
                                </div>
                                <div>
                                  <h2 class="accordion-header" id="flush-headingOne">
                                    <a id="btn2" href="#question2" class="btn btn-success" data-toggle="collapse">
                                    <?php echo $languages[$lang]['faq_q2'];?> #2
                                    </a>
                                  </h2>
                                  <div id="question2" class="collapse">
                                          <strong><?php echo $languages[$lang]['faq_q2_a1'];?></strong> 
                                          <br><?php echo $languages[$lang]['faq_q2_a2'];?>
                                          <br><br><strong><?php echo $languages[$lang]['faq_q2_a3'];?></strong><br>
                                          <?php echo $languages[$lang]['faq_q2_a4'];?><br>
                                          <?php echo $languages[$lang]['faq_q2_a5'];?><br>
                                          <?php echo $languages[$lang]['faq_q2_a6'];?><br>
                                          <?php echo $languages[$lang]['faq_q2_a7'];?>
                                  </div>
                                </div>
                                <div>
                                  <h2 class="accordion-header" id="flush-headingOne">
                                    <a id="btn3" href="#question3" class="btn btn-success" data-toggle="collapse">
                                    <?php echo $languages[$lang]['faq_q3'];?> #3
                                    </a>
                                  </h2>
                                  <div id="question3" class="collapse">
                                  <strong><?php echo $languages[$lang]['faq_q3_a1'];?></strong><br>
                                  <?php echo $languages[$lang]['faq_q3_a2'];?><br>
                                  <?php echo $languages[$lang]['faq_q3_a3'];?>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="card mb-4" style="overflow-x: auto;">
                            <div class="card-body">
                              <div class="container-contact">
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="contact-info">
                                      <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
                                      <h2><?php echo $languages[$lang]['contact_us'];?></h2>
                                      <h4><?php echo $languages[$lang]['contact_message'];?></h4>
                                    </div>
                                  </div>
                                  <div class="col-md-9">
                                    <form method="post" autocomplete="off">
                                    <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>"/>
                                    <div class="contact-form">
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="fname"><?php echo $languages[$lang]['first_name'];?>:</label>
                                          <div class="col-sm-offset-2 col-sm-10" style="text-align:center;">
                                          <input type="text" class="form-control" id="fname" style="color: black; background-color: white;" placeholder="<?php echo $languages[$lang]['first_name'];?>" name="firstName" required>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="lname"><?php echo $languages[$lang]['last_name'];?>:</label>
                                          <div class="col-sm-offset-2 col-sm-10" style="text-align:center;">
                                          <input type="text" class="form-control" id="lname" style="color: black; background-color: white;" placeholder="<?php echo $languages[$lang]['last_name'];?>" name="lastName" required>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="comment"><?php echo $languages[$lang]['comment'];?>:</label>
                                          <div class="col-sm-offset-2 col-sm-10" style="text-align:center;">
                                          <textarea class="form-control" rows="5" id="comment" name="comment" placeholder="<?php echo $languages[$lang]['comment'] ?>" style="border:2px solid black; border-radius:10px; background-color: white; color: black;" required></textarea>
                                          </div>
                                        </div>
                                        <div class="form-group">        
                                          <div class="col-sm-offset-2 col-sm-10" style="text-align:center;">
                                          <button type="submit" class="btn btn-default" style="width:200px;"><?php echo $languages[$lang]['submit'];?></button>
                                          </div>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                              <br />

                              <div class="col-md-2">
                                <a class="nav-link" href="ContactUs.php" target="_blank" style="color:#cccccc;">
                                  <?php echo $languages[$lang]['contact_us'];?>
                                </a>
                              </div>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- Footer -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="copyright">
                            <script>
                            document.write(new Date().getFullYear())
                            </script> &copy; Cloud Analytics provided by Tech Army.
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        </div>
        
        <!--   Core JS Files   -->
        <script src="../lib/assets/js/core/jquery.min.js"></script>
        <script src="../lib/assets/js/core/popper.min.js"></script>
        <script src="../lib/assets/js/core/bootstrap.min.js"></script>
        <script src="../lib/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Chart JS
        <script src="../lib/assets/js/plugins/chartjs.min.js"></script> -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../lib/assets/js/black-dashboard.min.js"></script>
        <script>
            
            /* --- CHANGE THEME MODE --- */
            $('#checkbox').change(function(){
                if($(this).is(":checked")) {
                $('body').addClass('change-background');
                    setTimeout(function() {
                    $('body').removeClass('change-background');
                    $('body').addClass('white-content');
                    }, 100);
                } else {
                $('body').addClass('change-background');
                    setTimeout(function() {
                    $('body').removeClass('change-background');
                    $('body').removeClass('white-content');
                    }, 100);
                }
            });


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
                $(document).ready(function() {
                $("#searchUser").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#userTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
            $().ready(function() {
                $sidebar = $('.sidebar');
                $navbar = $('.navbar');
                $main_panel = $('.main-panel');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');
                sidebar_mini_active = true;

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                var $btn = $(this);

                if (sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    sidebar_mini_active = false;
                    blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                } else {
                    $('body').addClass('sidebar-mini');
                    sidebar_mini_active = true;
                    blackDashboard.showSidebarMessage('Sidebar mini activated...');
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);
                });
            });
            });
        </script>
        <div id="successModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"><?php echo $languages[$lang]['success'];?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <p><?php echo $languages[$lang]['successfully_created'];?></p>
              </div>
              <div class="modal-footer">
                            <a href="dashboard_vm.php" class="btn btn-danger" data-dismiss="modal"><?php echo $languages[$lang]['close'];?></a>
              </div>
            </div>
          </div>
        </div>
        <div id="failureModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"><?php echo $languages[$lang]['error'];?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <p><?php echo $languages[$lang]['failed_to_create'];?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $languages[$lang]['close'];?></button>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>