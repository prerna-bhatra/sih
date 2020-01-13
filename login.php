<?php
include_once 'config/database.php';
$database=new Database();
$db=$database->getConnection();

session_start();
    include_once 'include/class.user.php';
    $user = new User();
    if (isset($_REQUEST['submit'])) {
        extract($_REQUEST);
        $login = $user->check_login($emailusername, $password);
        if ($login) {
 // Registration Success
           header("location:home.php");
        } else {
            // Registration Failed
            echo 'Wrong username or password';
        }
    }


?>