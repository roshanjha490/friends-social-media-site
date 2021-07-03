<?php

// database connection file 
include '../include/connect.php';

session_start();

$following_id = $_POST['following_id'];

$user_id = $_SESSION['user_key']['id'];

if (!$following_id) {
    header("location:login.php");
}


if ($following_id && $user_id) {

    $server_Obj->unfollow_user($following_id, $user_id);
}
