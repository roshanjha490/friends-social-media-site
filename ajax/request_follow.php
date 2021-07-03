<?php

// database connection file 
include '../include/connect.php';

session_start();

$requested_id = $_POST['requested_id'];

$user_id = $_SESSION['user_key']['id'];

if (!$requested_id) {
    header("location:login.php");
}


if ($requested_id && $user_id) {

    $res = $server_Obj->request_user($requested_id, $user_id);
}


echo $res;
