<?php
    require_once('../model/signup_model.php');
    
    class SignupController {
        public $signupModel;

        public function __construct() {
            $this->signupModel = new SignupModel();
        }

        public function userSignup() {
            $result = $this->signupModel->registerUser();
            if ($result == true) {
                header('location: ../view/login.php');
            } else {
                header('location: ../view/error.php');
            }
        }
    }
?>