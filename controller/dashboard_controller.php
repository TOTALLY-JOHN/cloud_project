<?php
    require_once('../model/dashboard_model.php');
    
    class DashboardController {
        public $dashboardModel;

        public function __construct() {
            $this->dashboardModel = new DashboardModel();
        }

        //! VIRTUAL MACHINE
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

        //! VIRTUAL MACHINE USAGE
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

        //! HELP CASES 
        public function createCase() {
            $result = $this->dashboardModel->createHelpCase();
            return $result;
        }

        public function updateCaseStatus() {
            $result = $this->dashboardModel->updateHelpCaseStatus();
            return $result;
        }

        public function deleteCase($caseId) {
            $result = $this->dashboardModel->deleteHelpCase($caseId);
            return $result;
        }

        public function getCase($caseId) {
            $result = $this->dashboardModel->getHelpCase($caseId);
            return $result;
        }

        public function getAllCases() {
            $result = $this->dashboardModel->getAllHelpCases();
            return $result;
        }

        public function getAllMyCases($username) {
            $result = $this->dashboardModel->getAllMyHelpCases($username);
            return $result;
        }
    }
?>