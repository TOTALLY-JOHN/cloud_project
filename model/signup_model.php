<?php
    class SignupModel {
        public function registerUser() {
            function test_input($data) { 
                $data = trim($data); 
                $data = stripslashes($data); 
                $data = htmlspecialchars($data); 
                return $data; 
            }
            $dbc = @mysqli_connect ('localhost', 'id16637642_techadmin', '57IJL!=zicWVUi#R', 'id16637642_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $q1 = "SELECT COUNT(username) AS 'NUM' FROM users WHERE username = '".$_REQUEST['username']."'";
            $r1 = @mysqli_query ($dbc, $q1);
            $row = mysqli_fetch_array($r1, MYSQLI_ASSOC);

            $username = test_input($_REQUEST["username"]);
            $userPwd = test_input($_REQUEST["userPwd"]);
            $userEmail = test_input($_REQUEST["userEmail"]);

            if($row['NUM']<1) {
                $sql = "INSERT INTO users (username, userPwd, userEmail) VALUES ('".$username."','".hash('sha256', $userPwd)."','".$userEmail."')";
                if ($dbc->query($sql) === TRUE) {
                    $_SESSION["signup_status"] = "success";
                    return "signup-success";
                } else {
                    $_SESSION["signup_status"] = "failure";
                    return "signup-error-query";
                }
            } else {
                $_SESSION["signup_status"] = "failure";
                return "signup-error-duplicate-username";
            }
        }
    }
?>