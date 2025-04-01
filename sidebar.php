<?php
// echo $_SESSION['privilege'] ;
$privilege = $_SESSION['privilege'];
if ($privilege == "Admin") {    // print_r($_SESSION);
    include 'admin_sidebar.php';
}

?>