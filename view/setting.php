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
        <title>Setting</title>
    </head>
    

    <script type="text/javascript">
        
    </script>
  

    <style>
        body
        {
            background: #f5f5f5;
            margin-top:20px;
        }

        .ui-w-80 
        {
            width: 80px !important;
            height: auto;
        }

        .btn-default 
        {
            border-color: rgba(24,28,33,0.1);
            background: rgba(0,0,0,0);
            color: #4E5155;
        }

        label.btn 
        {
            margin-bottom: 0;
        }

        .btn-outline-primary 
        {
            border-color: #26B4FF;
            background: transparent;
            color: #26B4FF;
        }

        .btn 
        {
            cursor: pointer;
        }

        .text-light 
        {
            color: #babbbc !important;
        }

        .btn-facebook 
        {
            border-color: rgba(0,0,0,0);
            background: #3B5998;
            color: #fff;
        }

        .btn-instagram 
        {
            border-color: rgba(0,0,0,0);
            background: #000;
            color: #fff;
        }

        .card
        {
            background-clip: padding-box;
            box-shadow: 0 1px 4px rgba(24,28,33,0.012);
        }

        .row-bordered 
        {
            overflow: hidden;
        }

        .account-settings-fileinput 
        {
            position: absolute;
            visibility: hidden;
            width: 1px;
            height: 1px;
            opacity: 0;
        }
        .account-settings-links .list-group-item.active 
        {
            font-weight: bold !important;
        }
        html:not(.dark-style) .account-settings-links .list-group-item.active 
        {
            background: transparent !important;
        }
        .account-settings-multiselect ~ .select2-container 
        {
            width: 100% !important;
        }
        .light-style .account-settings-links .list-group-item 
        {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }
        .light-style .account-settings-links .list-group-item.active 
        {
            color: #4e5155 !important;
        }
        .material-style .account-settings-links .list-group-item 
        {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }
        .material-style .account-settings-links .list-group-item.active 
        {
            color: #4e5155 !important;
        }
        .dark-style .account-settings-links .list-group-item 
        {
            padding: 0.85rem 1.5rem;
            border-color: rgba(255, 255, 255, 0.03) !important;
        }
        .dark-style .account-settings-links .list-group-item.active 
        {
            color: #fff !important;
        }
        .light-style .account-settings-links .list-group-item.active 
        {
            color: #4E5155 !important;
        }
        .light-style .account-settings-links .list-group-item 
        {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24,28,33,0.03) !important;
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
                        <h1 class="mt-4">Setting</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Setting</li>
                        </ol>
                    </div>

                    <!----HERE------>
               <div class="container light-style flex-grow-1 container-p-y">

                    <h4 class="font-weight-bold py-3 mb-4">
                      Account settings
                    </h4>

                    <div class="card overflow-hidden">
                      <div class="row no-gutters row-bordered row-border-light">
                        <div class="col-md-3 pt-0">
                          <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Social links</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Connections</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notifications</a>
                          </div>
                        </div>
                        <div class="col-md-9">
                          <div class="tab-content">
                            <div class="tab-pane fade active show" id="account-general">

                              <div class="card-body media align-items-center">
                                <img src="https://toolssumo.com/wp-content/uploads/2018/06/Anonymous-Whatsapp-profile-picture-1.jpg" alt="" class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                  <label class="btn btn-outline-primary">
                                    Upload new photo
                                    <input type="file" class="account-settings-fileinput">
                                  </label> &nbsp;
                                  <button type="button" class="btn btn-default md-btn-flat">Reset</button>

                                  <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                              </div>
                              <hr class="border-light m-0">

                              <div class="card-body">
                                <div class="form-group">
                                  <label class="form-label">Username</label>
                                  <input type="text" class="form-control mb-1" value="Mitnick66">
                                </div>
                                <div class="form-group">
                                  <label class="form-label">Name</label>
                                  <input type="text" class="form-control" value="Kevin Mitnick">
                                </div>
                                <div class="form-group">
                                  <label class="form-label">E-mail</label>
                                  <input type="text" class="form-control mb-1" value="Mitnick66@mail.com">
                                  <div class="alert alert-warning mt-3">
                                    Your email is not confirmed. Please check your inbox.<br>
                                    <a href="javascript:void(0)">Resend confirmation</a>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="form-label">Company</label>
                                  <input type="text" class="form-control" value="Company Ltd.">
                                </div>
                              </div>

                            </div>
                            <div class="tab-pane fade" id="account-change-password">
                              <div class="card-body pb-2">

                                <div class="form-group">
                                  <label class="form-label">Current password</label>
                                  <input type="password" class="form-control">
                                </div>

                                <div class="form-group">
                                  <label class="form-label">New password</label>
                                  <input type="password" class="form-control">
                                </div>

                                <div class="form-group">
                                  <label class="form-label">Repeat new password</label>
                                  <input type="password" class="form-control">
                                </div>

                              </div>
                            </div>
                            <div class="tab-pane fade" id="account-info">
                              <div class="card-body pb-2">

                                <div class="form-group">
                                  <label class="form-label">Bio</label>
                                  <textarea class="form-control" rows="5">Kevin David Mitnick (born August 6, 1963) is an American computer security consultant, author, and convicted hacker. He now runs the security firm Mitnick Security Consulting, LLC. He is also the Chief Hacking Officer and part ownerof the security awareness training company KnowBe4, as well as an active advisory board member at Zimperium,a firm that develops a mobile intrusion prevention system.</textarea>
                                </div>
                                <div class="form-group">
                                  <label class="form-label">Birthday</label>
                                  <input type="text" class="form-control" value="August 6, 1963">
                                </div>
                                <div class="form-group">
                                  <label class="form-label">Country</label>
                                  <select class="custom-select">
                                    <option>USA</option>
                                    <option selected="">Canada</option>
                                    <option>UK</option>
                                    <option>Germany</option>
                                    <option>France</option>
                                  </select>
                                </div>


                              </div>
                              <hr class="border-light m-0">
                              <div class="card-body pb-2">

                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                  <label class="form-label">Phone</label>
                                  <input type="text" class="form-control" value="+0 (123) 456 7891">
                                </div>
                                <div class="form-group">
                                  <label class="form-label">Website</label>
                                  <input type="text" class="form-control" value="">
                                </div>

                              </div>
      
                            </div>
                            <div class="tab-pane fade" id="account-social-links">
                              <div class="card-body pb-2">

                                <div class="form-group">
                                  <label class="form-label">Twitter</label>
                                  <input type="text" class="form-control" value="https://twitter.com/user">
                                </div>
                                <div class="form-group">
                                  <label class="form-label">Facebook</label>
                                  <input type="text" class="form-control" value="https://www.facebook.com/user">
                                </div>
                                <div class="form-group">
                                  <label class="form-label">Google+</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                  <label class="form-label">LinkedIn</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                  <label class="form-label">Instagram</label>
                                  <input type="text" class="form-control" value="https://www.instagram.com/user">
                                </div>

                              </div>
                            </div>
                            <div class="tab-pane fade" id="account-connections">
                              <div class="card-body">
                                <button type="button" class="btn btn-twitter">Connect to <strong>Twitter</strong></button>
                              </div>
                              <hr class="border-light m-0">
                              <div class="card-body">
                                <h5 class="mb-2">
                                  <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i class="ion ion-md-close"></i> Remove</a>
                                  <i class="ion ion-logo-google text-google"></i>
                                  You are connected to Google:
                                </h5>
                                nmaxwell@mail.com
                              </div>
                              <hr class="border-light m-0">
                              <div class="card-body">
                                <button type="button" class="btn btn-facebook">Connect to <strong>Facebook</strong></button>
                              </div>
                              <hr class="border-light m-0">
                              <div class="card-body">
                                <button type="button" class="btn btn-instagram">Connect to <strong>Instagram</strong></button>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="account-notifications">
                              <div class="card-body pb-2">

                              <hr class="border-light m-0">
                              <div class="card-body pb-2">

                                <h6 class="mb-4">Application</h6>

                                <div class="form-group">
                                  <label class="switcher">
                                    <input type="checkbox" class="switcher-input" checked="">
                                    <span class="switcher-indicator">
                                      <span class="switcher-yes"></span>
                                      <span class="switcher-no"></span>
                                    </span>
                                    <span class="switcher-label">News and announcements</span>
                                  </label>
                                </div>
                                <div class="form-group">
                                  <label class="switcher">
                                    <input type="checkbox" class="switcher-input">
                                    <span class="switcher-indicator">
                                      <span class="switcher-yes"></span>
                                      <span class="switcher-no"></span>
                                    </span>
                                    <span class="switcher-label">Weekly product updates</span>
                                  </label>
                                </div>
                                <div class="form-group">
                                  <label class="switcher">
                                    <input type="checkbox" class="switcher-input" checked="">
                                    <span class="switcher-indicator">
                                      <span class="switcher-yes"></span>
                                      <span class="switcher-no"></span>
                                    </span>
                                    <span class="switcher-label">Weekly blog digest</span>
                                  </label>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="text-right mt-3">
                      <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
                      <button type="button" class="btn btn-default">Cancel</button>
                    </div>

               </div>
                    <!----HERE------>

                </main>
                <footer class="container-fluid text-center">
                    <p>Copyright 2021 &copy; Cloud Analytics provided by Tech Army</p>
                </footer>
            </div>
        </div>

    </body>


    </body>

    </html>