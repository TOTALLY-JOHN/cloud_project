<?php
    require_once('../model/login_model.php');

    class LoginController {
        public $loginModel;

        public function __construct() {
            $this->loginModel = new LoginModel();
        }

        public function authUserLogin() {
            $result = $this->loginModel->getLogin();
            if ($result == 'login-success') {
                header('location: ../view/dashboard.php');
            } else {    
                header('location: ../view/error.php');
            }
        }
    }
?>