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

        public function getVirtualMachineUsage($uuid) {
            $result = $this->dashboardModel->getVMUsage($uuid);
            return $result;
        }

        public function getVirtualMachineUsageDetails($usageID) {
            $result = $this->dashboardModel->getVMUsageDetails($usageID);
            return $result;
        }

        public function createVirtualMachineUsage() {
            $result = $this->dashboardModel->createVMUsage();
            return $result;
        }

        public function updateVirtualMachineUsage() {
            $result = $this->dashboardModel->updateVMUsage();
            return $result;
        }

        public function deleteVirtualMachineUsage($usageID) {
            $result = $this->dashboardModel->deleteVMUsage($usageID);
            return $result;
        }
    }
?>