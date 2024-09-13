<?php
session_start(); // เริ่ม session

function check_login() {
    if (!isset($_SESSION['username'])) {
        header("Location: http://localhost/connectform/loginpage/login-page.php");
        exit();
    }
}
?>
