<?php
    class LoginModel {
        public function getLogin() {
            function test_input($data) { 
                $data = trim($data); 
                $data = stripslashes($data); 
                $data = htmlspecialchars($data); 
                return $data;
            }
            if(isset($_REQUEST['usernameInput']) && isset($_REQUEST['pwdInput'])) {
                if ($_REQUEST['usernameInput'] == 'admin' && $_REQUEST['pwdInput'] == 'abcd1234') {
                    $_SESSION['username'] = "admin";
                    $_SESSION['userRole'] = "admin";
                    return 'login-success';    
                }
            }
            $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
            $username = test_input($_REQUEST["usernameInput"]);
            $userPwd = test_input($_REQUEST["pwdInput"]);
            $q1 = "SELECT username, userPwd FROM users WHERE username = '".$username."' AND userPwd = '".hash('sha256', $userPwd)."'";
            $r1 = @mysqli_query ($dbc, $q1);
            $row = mysqli_fetch_array($r1, MYSQLI_ASSOC);

            if (isset($_REQUEST['usernameInput']) && isset($_REQUEST['pwdInput'])) {
                if($row['username']==$username) {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['userRole'] = "admin";
                    return 'login-success';
                } 
                else {
                    return 'invalid user';
                }
            }

            
        }
    }
?>