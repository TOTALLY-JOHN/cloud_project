<?php
    require_once('../model/signup_model.php');
    
    class DashboardController {
        public $dashboardModel;

        public function __construct() {
            $this->dashboardModel = new DashboardModel();
        }

        public function fetchData() {
            $result = $this->dashboardModel->getAllData();
            return $result;
        }
    }
?>