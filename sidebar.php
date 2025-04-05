<?php
// echo $_SESSION['privilege'] ;
$privilege = $_SESSION['privilege'];
if ($privilege == "Admin") {    // print_r($_SESSION);
    include 'admin_sidebar.php';
}
if ($privilege == "Trucker") {    // print_r($_SESSION);
    include 'trucker_sidebar.php';
}

?>