<?php
    require_once('../model/profile_model.php');
    
    class ProfileController {
        public $profileModel;

        public function __construct() {
            $this->profileModel = new ProfileModel();
        }

        public function changeProfile() {
            $result = $this->profileModel->changeUserProfile();
            return $result;
        }

        public function getProfile($username) {
            $result = $this->profileModel->getUserProfile($username);
            return $result;
        }

        public function resetUserPwd() {
            $result = $this->profileModel->authUser();
            if ($result == true) {
                header('location: ../view/login.php');
            } else {
                header('location: ../view/error.php');
            }
        }
    }
?>