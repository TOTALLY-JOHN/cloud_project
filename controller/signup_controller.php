<?php
    require_once('../model/signup_model.php');
    
    class SignupController {
        public $signupModel;

        public function __construct() {
            $this->signupModel = new SignupModel();
        }

        public function userSignup() {
            $result = $this->signupModel->registerUser();
            if ($result == 'signup-success') {
                $_SESSION["signup_status"] = "success";
                header('location: ../view/login.php');
            } else {
                $_SESSION["signup_status"] = "failure";
            }
        }
    }
?>