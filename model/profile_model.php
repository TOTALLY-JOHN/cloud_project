<?php
    class ProfileModel {
        public function requestChangePasswordForForgotPwd() {
            function test_username_input($data) {
                $data = trim($data);
                $data = stripslashes($data); 
                $data = htmlspecialchars($data); 
                return $data;
            }
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $username = test_input($_REQUEST["username"]);
            $sql = "UPDATE users SET forgotPwd = 1 WHERE username = '".$username."'";
            if ($dbc->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        }

        public function changeUserProfile() {
            function test_input($data) { 
                $data = trim($data); 
                $data = stripslashes($data); 
                $data = htmlspecialchars($data); 
                return $data;
            }
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $username = test_input($_REQUEST["username"]);
            $userEmail = test_input($_REQUEST["userEmail"]);
            $userPwd = test_input($_REQUEST["userPwd"]);
            $sql = "UPDATE users SET userPwd = '".hash('sha256', $userPwd)."', userEmail = '".$userEmail."' WHERE username = '".$username."'";
            if ($dbc->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        }

        public function getUserProfile($username) {
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $q1 = "SELECT * FROM users WHERE username = '".$username."'";
            $r1 = @mysqli_query ($dbc, $q1);
            $row = mysqli_fetch_array($r1, MYSQLI_ASSOC);
            return $row;
        }

        public function getAllUserProfiles() {
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $q1 = "SELECT * FROM users";
            $r1 = @mysqli_query ($dbc, $q1);
            return $r1;
        }

        public function allowChangePassword($username) {
            function test_input2($data) { 
                $data = trim($data); 
                $data = stripslashes($data); 
                $data = htmlspecialchars($data); 
                return $data;
            }
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $userPwd = "12345678";
            $sql = "UPDATE users SET userPwd = '".hash('sha256', $userPwd)."', forgotPwd = 0 WHERE username = '".$username."'";
            if ($dbc->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        }
    }
?>