<?php
    require_once('../model/forgot_password_model.php');
    
    class ForgotPwdController {
        public $forgotPwdModel;

        public function __construct() {
            $this->forgotPwdModel = new ForgotPwdModel();
        }

        public function resetUserPwd() {
            $result = $this->forgotPwdModel->authUser();
            if ($result == true) {
                header('location: ../view/login.php');
            } else {
                header('location: ../view/error.php');
            }
        }
    }
?>