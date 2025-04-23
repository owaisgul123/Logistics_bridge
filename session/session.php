<?php
include '../env_set.php';
session_start();


// username and password sent from form 

$myusername = $_POST['username'];
$mypassword = $_POST['password'];
// $mypassword = hash('sha256', $mypassword); 
// $mypassword = md5($mypassword);

$curl = curl_init();
// echo ''.$api_url.'get/login.php?key=03201232927&username='.$myusername.'&password='.$mypassword.'';
curl_setopt_array($curl, array(
    CURLOPT_URL => ''.$api_url.'get/login.php?key=03201232927&username='.$myusername.'&password='.$mypassword.'',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
)
);
// echo ''.$api_url.'get/login.php?key=03201232927&username='.$myusername.'&password='.$mypassword.'';
$response = curl_exec($curl);



curl_close($curl);
// echo $response;

$data = json_decode($response, true);
$status = $data['status'];
$rolePrivileges = [
    1 => "Admin",
    2 => "Trucking Company",
    3 => "Clearing Agent",
    4 => "Operational Manager",
    5 => "Importer",
    6 => "Exporter",
    7 => "Freight Forwarder",
    8 => "Master User",
    9 => "Order Booker",
    10 => "Accounts",
    11 => "Manager",
    12 => "Transport Cordinater"
];

// Access elements using array notation
//  $result = $data['result'];
   
 // If result matched $myusername and $mypassword, table row must be 1 row
 if ($status != "error") {
    $data_res = $data['data'];
   

    $_SESSION['email'] = $data_res['email'];
    $_SESSION['name'] = $data_res['name'];
    $_SESSION['user_id'] = $data_res['id'];
    $_SESSION['user_name'] = $data_res['name'];
    $_SESSION['role_id'] = $data_res['role_id'];
    $_SESSION['parent_id'] = $data_res['parent_id'];
    $role_id = (int) $data_res['role_id'];
    $_SESSION['privilege'] = isset($rolePrivileges[$role_id]) ? $rolePrivileges[$role_id] : "Other";

    // echo "privilege " . $_SESSION['privilege'];
    // if ($status != '1') {
    //     echo 2;
    // } else {
    //     echo 1;

    // }
    // print_r($_SESSION);
    // exit;
    echo 1;
} else {
    echo 0;
    // print_r($_SESSION);
}




?>