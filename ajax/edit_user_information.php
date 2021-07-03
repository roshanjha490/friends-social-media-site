<?php 

// database connection file 
include '../include/connect.php';

session_start();

$user_id = $_POST['user_id'];
$profile_pic = $_POST['profile_pic'];
$cover_pic = $_POST['cover_pic'];
$fullname = $_POST['user_fullname'];
$user_username = $_POST['user_username'];
$user_bio = $_POST['user_bio'];
$user_email = $_POST['user_email'];
$user_location = $_POST['user_location'];
$user_privacy_status = $_POST['user_privacy_status'];
$user_gender = $_POST['user_gender'];
$user_birth_date = $_POST['user_birth_date'];

echo $server_Obj->update_user_details($user_id, $user_username, $fullname, $user_email, $profile_pic, $cover_pic, $user_bio, $user_location, $user_gender, $user_birth_date, $user_privacy_status);


?>