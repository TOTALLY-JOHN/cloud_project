<?php
    session_start();
    class LoginModel {
        public function getLogin() {
            if (isset($_REQUEST['usernameInput']) && isset($_REQUEST['pwdInput'])) {
                if ($_REQUEST['usernameInput'] == 'admin' && $_REQUEST['pwdInput'] == 'abcd1234') {
                    $_SESSION['username'] = "admin";
                    return 'login-success';    
                }
                else if ($_REQUEST['usernameInput'] == 'jj123' && $_REQUEST['pwdInput'] == 'abcd1234') {
                    $_SESSION['username'] = $_REQUEST['usernameInput'];
                    return 'login-success';
                }
                else {
                    return 'invalid user';
                }
            }
        }
    }
?>