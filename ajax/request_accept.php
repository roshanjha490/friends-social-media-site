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

    $server_Obj->load_user_session_details($_SESSION['user_key']['id'], $_SESSION['user_key']['password']);

    $res = $server_Obj->request_user($user_id, $requested_id);

    $server_Obj->follow_user($requested_id, $user_id);

    $server_Obj->follow_user($user_id, $requested_id);
}


echo $res;
