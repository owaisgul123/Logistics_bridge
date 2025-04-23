<?php
include 'env_set.php';
session_start();
$user_id = $_SESSION['user_id'];
$privilege = $_SESSION['privilege'];
print_r($_SESSION);
if ($privilege == "Admin") {
    $redirectUrl = "admin_dashboard.php";
    header("Location: $redirectUrl");
}
else if ($privilege == "Trucking Company") {
    $redirectUrl = "trucker_dashboard.php";
    header("Location: $redirectUrl");
}
else if ($privilege == "Freight Forwarder") {
    $redirectUrl = "forwarder_dashboard.php";
    header("Location: $redirectUrl");
}



?>