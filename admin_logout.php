<?php
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
//  unset($_SESSION['']);
//  unset($_SESSION['password']);
//  unset($_SESSION['email']);
session_destroy();
$_SESSION['logedin'] = false;

header("Location:http://localhost/miniproj/admin_login.php")
?>