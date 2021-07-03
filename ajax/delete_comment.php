<?php 

include '../include/connect.php';


$post_id = $_POST['post_id'];
$index_of_comment = $_POST['index_of_comment'];
// session_start();

// echo 'kuch bhi';

if(!$_POST['post_id']){
    header("location:index.php");
}else{
    echo $server_Obj->delete_this_comment($post_id, $index_of_comment);
}
