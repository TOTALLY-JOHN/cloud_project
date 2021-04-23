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
            $result = $this->profileModel->requestChangePasswordForForgotPwd();
            return $result;
        }

        public function getAllProfiles() {
            $result = $this->profileModel->getAllUserProfiles();
            return $result;
        }

        public function allowChangePwd($username) {
            $result = $this->profileModel->allowChangePassword($username);
            return $result;
        }
    }
?>