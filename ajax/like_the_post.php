<?php 

// database connection file 
include '../include/connect.php';

$post_id = $_POST['Post_id'];

$user_id = $_POST['user_id'];

if ($_POST['Post_id'] == '') {
    header('location:../index.php');
}else{    
    echo $server_Obj->like_post($post_id, $user_id);
}
