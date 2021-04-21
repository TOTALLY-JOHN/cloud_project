<?php
    require_once('../model/dashboard_model.php');
    
    class DashboardController {
        public $dashboardModel;

        public function __construct() {
            $this->dashboardModel = new DashboardModel();
        }

        public function getVirtualMachine($uuid) {
            $result = $this->dashboardModel->getVMData($uuid);
            return $result;
        }

        public function getAllVirtualMachines() {
            $result = $this->dashboardModel->getAllVMData();
            return $result;
        }

        public function createVirtualMachine() {
            $result = $this->dashboardModel->createVMData();
            return $result;
        }

        public function updateVirtualMachine() {
            $result = $this->dashboardModel->updateVMData();
            return $result;
        }

        public function deleteVirtualMachine($uuid) {
            $result = $this->dashboardModel->deleteVMData($uuid);
            return $result;
        }
    }
?>