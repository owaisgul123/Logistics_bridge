<?php
// echo $_SESSION['privilege'] ;
$privilege = $_SESSION['privilege'];
if ($privilege == "Admin") {    // print_r($_SESSION);
    include 'admin_sidebar.php';
}
else if ($privilege == "Trucking Company") {
    include 'trucker_sidebar.php';

}
else if ($privilege == "Freight Forwarder") {
    include 'forwarder_sidebar.php';

}

?>