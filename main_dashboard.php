<?php
include 'env_set.php';
session_start();
$user_id = $_SESSION['user_id'];
$privilege = $_SESSION['privilege'];
if ($privilege == "Admin") {
    $redirectUrl = "admin_dashboard.php";
    header("Location: $redirectUrl");
} 
?>