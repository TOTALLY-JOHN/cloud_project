<?php
    session_start();
    require_once('../model/login_model.php');

    class LoginController {
        public $loginModel;

        public function __construct() {
            $this->loginModel = new LoginModel();
        }

        public function authUserLogin() {
            $result = $this->loginModel->getLogin();
            if ($result == 'login-success') {
                $_SESSION["login_status"] = "success";
                header('location: ../view/dashboard.php');
            } else {    
                $_SESSION["login_status"] = "failure";
                header('location: ../view/error.php');
            }
        }
    }
?>