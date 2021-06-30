<?php
    class DashboardModel {
        ////////////////////////////////////!
        //? VIRTUAL MACHINE DATA MODEL (CRUD)
        ////////////////////////////////////!
        public function getVMData($uuid) {
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            // $dbc = @mysqli_connect ('localhost', 'id16637642_techadmin', '57IJL!=zicWVUi#R', 'id16637642_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $q1 = "SELECT * FROM vm_details WHERE uuid = '".$uuid."'";
            $r1 = @mysqli_query ($dbc, $q1);
            $row = mysqli_fetch_array($r1, MYSQLI_ASSOC);
            return $row;
        }

        public function getAllVMSummaryData() {
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $q1 = "SELECT vm_details.uuid, vm_details.domainName, vm_details.status, AVG(vm_usage.cpuUsed) AS cpuAvg, AVG(vm_usage.memoryUsed) AS memoryAvg FROM vm_details JOIN vm_usage ON vm_details.uuid = vm_usage.uuid GROUP BY vm_details.uuid, vm_details.domainName, vm_details.status";
            $r1 = @mysqli_query ($dbc, $q1);
            return $r1;
        }

        public function getAllVMData() {
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            // $dbc = @mysqli_connect ('localhost', 'id16637642_techadmin', '57IJL!=zicWVUi#R', 'id16637642_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
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
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            // $dbc = @mysqli_connect ('localhost', 'id16637642_techadmin', '57IJL!=zicWVUi#R', 'id16637642_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
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

            $sql = "INSERT INTO vm_details VALUES ('".$vmUUID."','".$domainName."','".$storageCapacity."','".$storageAllocation."','".$storageAvailable."','".$memoryAllocation."','".$cpuAllocation."','".$deviceType."','".$sourcePath."','".$storageFormat."', 'stopping')";
            if ($dbc->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        }

        public function updateVMData() {
            function test_input2($data) { 
                $data = trim($data); 
                $data = stripslashes($data); 
                $data = htmlspecialchars($data); 
                return $data;
            }
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            // $dbc = @mysqli_connect ('localhost', 'id16637642_techadmin', '57IJL!=zicWVUi#R', 'id16637642_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $vmUUID = test_input2($_REQUEST["vmUUID"]);
            $domainName = test_input2($_REQUEST["domainName"]);
            $storageCapacity = test_input2($_REQUEST["storageCapacity"]);
            $storageAllocation = test_input2($_REQUEST["storageAllocation"]);
            $storageAvailable = test_input2($_REQUEST["storageAvailable"]);
            $memoryAllocation = test_input2($_REQUEST["memoryAllocation"]);
            $cpuAllocation = test_input2($_REQUEST["cpuAllocation"]);
            $deviceType = test_input2($_REQUEST["deviceType"]);
            $sourcePath = test_input2($_REQUEST["sourcePath"]);
            $storageFormat = test_input2($_REQUEST["storageFormat"]);
            $status = test_input2($_REQUEST["status"]);

            $sql = "UPDATE vm_details SET domainName = '".$domainName."', storageCapacity = '".$storageCapacity."', storageAllocation = '".$storageAllocation."', storageAvailable = '".$storageAvailable."', memoryAllocation = '".$memoryAllocation."', cpuAllocation = '".$cpuAllocation."', deviceType = '".$deviceType."', sourcePath = '".$sourcePath."', storageFormat = '".$storageFormat."', status = '".$status."' WHERE uuid = '".$vmUUID."'";
            if ($dbc->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        }

        public function deleteVMData($uuid) {
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $sql = "DELETE FROM vm_details WHERE uuid = '".$uuid."'";
            if ($dbc->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        }

        ////////////////////////////////////!
        //? VIRTUAL MACHINE USAGE DATA MODEL (CRUD)
        ////////////////////////////////////!
        public function getVMUsage($uuid) {
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            // $dbc = @mysqli_connect ('localhost', 'id16637642_techadmin', '57IJL!=zicWVUi#R', 'id16637642_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $q1 = "SELECT * FROM vm_usage WHERE uuid = '".$uuid."'";
            $r1 = @mysqli_query ($dbc, $q1);
            return $r1;
        }

        public function getVMUsageDetails($usageID) {
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            // $dbc = @mysqli_connect ('localhost', 'id16637642_techadmin', '57IJL!=zicWVUi#R', 'id16637642_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $q1 = "SELECT * FROM vm_usage WHERE usageID = '".$usageID."'";
            $r1 = @mysqli_query ($dbc, $q1);
            $row = mysqli_fetch_array($r1, MYSQLI_ASSOC);
            return $row;
        }

        public function createVMUsage() {
            function test_input3($data) { 
                $data = trim($data); 
                $data = stripslashes($data); 
                $data = htmlspecialchars($data); 
                return $data;
            }
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            // $dbc = @mysqli_connect ('localhost', 'id16637642_techadmin', '57IJL!=zicWVUi#R', 'id16637642_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $vmUUID = test_input3($_REQUEST["vmUUID"]);
            $usageDate = test_input3($_REQUEST["usageDate"]);
            $cpuUsed = test_input3($_REQUEST["cpuUsed"]);
            $memoryUsed = test_input3($_REQUEST["memoryUsed"]);

            $sql = "INSERT INTO vm_usage (uuid, usageDate, cpuUsed, memoryUsed) VALUES ('".$vmUUID."','".$usageDate."','".$cpuUsed."','".$memoryUsed."')";
            if ($dbc->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        }

        public function updateVMUsage() {
            function test_input4($data) { 
                $data = trim($data); 
                $data = stripslashes($data); 
                $data = htmlspecialchars($data); 
                return $data;
            }
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            // $dbc = @mysqli_connect ('localhost', 'id16637642_techadmin', '57IJL!=zicWVUi#R', 'id16637642_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $usageID = test_input4($_REQUEST["usageID"]);
            $usageDate = test_input4($_REQUEST["usageDate"]);
            $cpuUsed = test_input4($_REQUEST["cpuUsed"]);
            $memoryUsed = test_input4($_REQUEST["memoryUsed"]);

            $sql = "UPDATE vm_usage SET usageDate = '".$usageDate."', cpuUsed = '".$cpuUsed."', memoryUsed = '".$memoryUsed."' WHERE usageID = '".$usageID."'";
            if ($dbc->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        }

        public function deleteVMUsage($usageID) {
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $sql = "DELETE FROM vm_usage WHERE usageID = '".$usageID."'";
            if ($dbc->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        }

        ////////////////////////////////////!
        //? HELP CASE DATA MODEL (CRUD)
        ////////////////////////////////////!
        public function createHelpCase() {
            function test_input5($data) { 
                $data = trim($data); 
                $data = stripslashes($data); 
                $data = htmlspecialchars($data); 
                return $data;
            }
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $firstName = test_input5($_REQUEST["firstName"]);
            $lastName = test_input5($_REQUEST["lastName"]);
            $username = test_input5($_REQUEST["username"]);
            $comment = test_input5($_REQUEST["comment"]);
            $caseStatus = "pending";

            $sql = "INSERT INTO cases (firstName, lastName, username, comment, caseStatus, resultMessage) VALUES ('".$firstName."','".$lastName."','".$username."','".$comment."','".$caseStatus."', '')";
            if ($dbc->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        }

        public function updateHelpCaseStatus() {
            function test_input6($data) { 
                $data = trim($data); 
                $data = stripslashes($data); 
                $data = htmlspecialchars($data); 
                return $data;
            }
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $caseId = test_input6($_REQUEST["caseId"]);
            $caseStatus = test_input6($_REQUEST["caseStatus"]);
            $resultMessage = test_input6($_REQUEST["resultMessage"]);

            $sql = "UPDATE cases SET caseStatus = '".$caseStatus."', resultMessage = '".$resultMessage."' WHERE caseId = '".$caseId."'";
            if ($dbc->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        }

        public function deleteHelpCase($caseId) {
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $sql = "DELETE FROM cases WHERE caseId = '".$caseId."'";
            if ($dbc->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        }

        public function getHelpCase($caseId) {
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            // $dbc = @mysqli_connect ('localhost', 'id16637642_techadmin', '57IJL!=zicWVUi#R', 'id16637642_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $q1 = "SELECT * FROM cases WHERE caseId = '".$caseId."'";
            $r1 = @mysqli_query ($dbc, $q1);
            $row = mysqli_fetch_array($r1, MYSQLI_ASSOC);
            return $row;
        }

        public function getAllHelpCases() {
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            // $dbc = @mysqli_connect ('localhost', 'id16637642_techadmin', '57IJL!=zicWVUi#R', 'id16637642_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $q1 = "SELECT * FROM cases ORDER BY caseId DESC";
            $r1 = @mysqli_query ($dbc, $q1);
            return $r1;
        }

        public function getAllMyHelpCases($username) {
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            // $dbc = @mysqli_connect ('localhost', 'id16637642_techadmin', '57IJL!=zicWVUi#R', 'id16637642_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $q1 = "SELECT * FROM cases WHERE username = '".$username."' ORDER BY caseId ASC";
            $r1 = @mysqli_query ($dbc, $q1);
            return $r1;
        }

        ////////////////////////////////////!
        //? CASE HISTORY DATA MODEL
        ////////////////////////////////////!
        public function createHistory() {
            function test_input7($data) { 
                $data = trim($data); 
                $data = stripslashes($data); 
                $data = htmlspecialchars($data); 
                return $data;
            }
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $caseId = test_input7($_REQUEST["caseId"]);
            $message = test_input7($_REQUEST["resultMessage"]);
            $status = test_input7($_REQUEST["caseStatus"]);

            $sql = "INSERT INTO case_history (caseId, message, status) VALUES ('".$caseId."','".$message."','".$status."')";
            if ($dbc->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        }

        public function getAllHistory() {
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $q1 = "SELECT * FROM case_history ORDER BY historyId DESC";
            $r1 = @mysqli_query ($dbc, $q1);
            return $r1;
        }

        ////////////////////////////////////!
        //? NOTIFICATION DATA MODEL
        ////////////////////////////////////!
        public function createNotification($sender, $recipient, $role) {
            function test_input8($data) { 
                $data = trim($data); 
                $data = stripslashes($data); 
                $data = htmlspecialchars($data); 
                return $data;
            }
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $message = "Case ID: " . test_input8($_REQUEST["caseId"]) . ", Message: " . test_input8($_REQUEST["resultMessage"]) . ", Status: " . test_input8($_REQUEST["caseStatus"]);

            $sql = "INSERT INTO notification (notifySender, notifyRecipient, notifyContent, role, readStatus) VALUES ('".$sender."','".$recipient."','".$message."','".$role."','0',)";
            if ($dbc->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        }

        public function readNotification($recipient) {
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

            $sql = "UPDATE notification SET readStatus = 1 WHERE notifyRecipient = '".$recipient."'";
            if ($dbc->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        }

        public function getNotifications($recipient) {
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $q1 = "SELECT * FROM notification ORDER BY historyId DESC WHERE notifyRecipient = '".$recipient."'";
            $r1 = @mysqli_query ($dbc, $q1);
            return $r1;
        }
    }
?>