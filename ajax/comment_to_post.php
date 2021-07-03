<?php 

// database connection file 
include '../include/connect.php';


$post_comment_id = $_POST['post_comment_id'];

$commenter_id = $_POST['commenter_id'];

$commenter_comment = $_POST['commenter_comment'];


if ($_POST['commenter_id'] == '') {
    header('location:../index.php');
}else{    
    echo $server_Obj->comment_the_post($post_comment_id, $commenter_id, $commenter_comment);
}
