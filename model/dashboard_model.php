<?php
    class DashboardModel {
        public function getVMData($uuid) {
            $dbc = @mysqli_connect ('localhost', 'id16637642_techadmin', '57IJL!=zicWVUi#R', 'id16637642_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $q1 = "SELECT * FROM vm_details WHERE uuid = $uuid";
            $r1 = @mysqli_query ($dbc, $q1);
            return $r1;
        }

        public function getAllVMData() {
            $dbc = @mysqli_connect ('localhost', 'id16637642_techadmin', '57IJL!=zicWVUi#R', 'id16637642_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $q1 = "SELECT * FROM vm_details";
            $r1 = @mysqli_query ($dbc, $q1);
            return $r1;
        }

        public function createVMData() {
            function test_input($data) { 
                $data = trim($data); 
                $data = stripslashes($data); 
                $data = htmlspecialchars($data); 
                return $data;
            }
            $dbc = @mysqli_connect ('localhost', 'id16637642_techadmin', '57IJL!=zicWVUi#R', 'id16637642_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $vmUUID = test_input($_REQUEST["vmUUID"]);
            $domainName = test_input($_REQUEST["domainName"]);
            $storageCapacity = test_input($_REQUEST["storageCapacity"]);
            $storageAllocation = test_input($_REQUEST["storageAllocation"]);
            $storageAvailable = test_input($_REQUEST["storageAvailable"]);
            $memoryAllocation = test_input($_REQUEST["memoryAllocation"]);
            $cpuAllocation = test_input($_REQUEST["cpuAllocation"]);
            $deviceType = test_input($_REQUEST["deviceType"]);
            $sourcePath = test_input($_REQUEST["sourcePath"]);
            $storageFormat = test_input($_REQUEST["storageFormat"]);

            $sql = "INSERT INTO vm_details VALUES ('".$vmUUID."','".$domainName."','".$storageCapacity."','".$storageAllocation."','".$storageAvailable."','".$memoryAllocation."','".$cpuAllocation."','".$deviceType."','".$sourcePath."','".$storageFormat."')";
            if ($dbc->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        }

        public function updateVMData() {
            return null;
        }

        public function deleteVMData() {
            return null;
        }
    }
?>