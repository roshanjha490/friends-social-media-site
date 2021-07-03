<?php 

include '../include/connect.php';


$user_id = $_POST['user_id'];
$post_id = $_POST['post_id'];
$index_of_comment = $_POST['index_of_comment'];
// session_start();

echo 'kuch bhi';

if(!$_POST['user_id']){
    header("location:index.php");
}else{
    echo $server_Obj->like_this_comment($user_id, $post_id, $index_of_comment);
}

?>